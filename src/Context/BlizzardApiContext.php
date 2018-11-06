<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;

class BlizzardApiContext
{
    private $clientId      = false;
    private $clientSecret  = false;
    private $region        = false;
    private $baseUrl       = false;
    private $locale        = false;
    private $accessToken   = false;
    private $expiresAt     = false;
    private $tokenType     = false;
    private $retries       = 3;
    private $sleepTime     = 2;
    private $profiling     = false;
    private $profilingData = [];


    /**
     * BlizzardApiProvider constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param $region
     * @param string $locale
     * @param bool|string $accessToken
     * @internal param array $options
     * @internal param array $collaborators
     */
    public function __construct(
        $clientId,
        $clientSecret,
        $region,
        $locale,
        $accessToken = false
    )
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->region       = strtoupper($region);
        $this->locale       = $locale;
        $this->baseUrl      = ApiUrls::getBaseUrl($this->region);

        if ($accessToken !== false) {
            $this->accessToken = $accessToken;
            return;
        }
        $this->getAccessToken();

    }


    public function getAccessToken(){
        if ($this->accessToken !== false && $this->expiresAt > time()) {
            return $this->accessToken;
        }
        $client   = new Client();
        $response = $client->request('POST', ApiUrls::getTokenUrl($this->region) . '?grant_type=client_credentials', [
            'headers' => [
                'Authorization' => 'Basic '
                    . base64_encode($this->clientId . ":" . $this->clientSecret),
            ]
        ]);
        if($response->getStatusCode() !== 200){
            throw new \Exception(
                'Error connecting to API: [' . $response->getStatusCode() . '] ' . $response->getReasonPhrase()
            );
        }
        $result = json_decode((string) $response->getBody());
        $this->accessToken = $result->access_token;
        $this->tokenType   = $result->token_type;
        $this->expiresAt   = time() + $result->expires_in;
        return $this->accessToken;
    }

    public function getTokenType(){
        return $this->tokenType;
    }

    public function getExpiresAt(){
        return $this->expiresAt;
    }

    public function getRegion(){
        return $this->region;
    }

    public function getLocale(){
        return $this->locale;
    }

    public function getRetryLimit(){
        return $this->retries;
    }

    public function getRetrySleepTime(){
        return $this->sleepTime;
    }

    /**
     * @return bool
     */
    public function isProfiling(): bool
    {
        return $this->profiling;
    }

    /**
     * @param bool $profiling
     */
    public function setProfiling(bool $profiling): void
    {
        $this->profiling = $profiling;
    }

    public function addMeasurement(string $className, float $runtime): void
    {
        if(!isset($this->profilingData[$className])){
            $this->profilingData[$className] = [];
        }
        $this->profilingData[$className][] = $runtime;
    }

    public function getProfilingData(){
        $result = [];
        foreach ($this->profilingData as $endpoint => $data){
            $result[$endpoint] = [
                'min'   => min($data),
                'max'   => max($data),
                'avg'   => array_sum($data) / count($data),
                'count' => count($data),
            ];
        }
        return $result;
    }
}
