<?php

namespace BlizzardApiService\Context;

class BlizzardOauthContext
{
    private $clientId     = false;
    private $clientSecret = false;
    private $redirectUrl  = false;
    private $baseUrl      = false;
    private $authBaseUrl  = false;
    private $namespace    = '';
    private $locale       = false;

    private $accessToken  = false;

    /**
     * BlizzardApiProvider constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param string $namespace
     * @param string $locale
     * @param bool|string $accessToken
     * @internal param array $options
     * @internal param array $collaborators
     */
    public function __construct($clientId, $clientSecret, $redirectUrl, $namespace, $locale, $accessToken = false)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl  = $redirectUrl;
        $this->namespace    = $namespace;
        $this->locale       = $locale;

        if($accessToken !== false){
            $this->accessToken = $accessToken;
        }else{
            $this->_getAccessToken();
        }
    }


    private function _getAccessToken(){

    }

    public function getAccessToken(){
        return $this->accessToken;
    }
}