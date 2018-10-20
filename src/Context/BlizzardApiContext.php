<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;

class BlizzardApiContext
{
    private $clientId     = false;
    private $clientSecret = false;
    private $region       = false;
    private $baseUrl      = false;
    private $locale       = false;
    private $accessToken  = false;
    private $expiresIn    = false;
    private $tokenType    = false;

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
        }else{
            $this->_getAccessToken();
        }
    }


    private function _getAccessToken(){
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
        $this->expiresIn  = $result->expires_in;
    }

    public function getAccessToken(){
        return $this->accessToken;
    }

    public function getTokenType(){
        return $this->tokenType;
    }

    public function getExpiresIn(){
        return $this->expiresIn;
    }

    public function getRegion(){
        return $this->region;
    }

    public function getLocale(){
        return $this->locale;
    }
}