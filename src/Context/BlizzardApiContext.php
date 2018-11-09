<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;

class BlizzardApiContext extends ApiContext
{
    protected $accessToken   = false;
    protected $expiresAt     = false;
    protected $tokenType     = false;


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
        $accessToken = null
    )
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->region       = strtoupper($region);
        $this->locale       = $locale;
        $this->baseUrl      = ApiUrls::getBaseUrl($this->region);

        if ($accessToken !== null) {
            $this->accessToken = $accessToken;
            return;
        }
        $this->getAccessToken();
    }


    public function getAccessToken():string
    {
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
}
