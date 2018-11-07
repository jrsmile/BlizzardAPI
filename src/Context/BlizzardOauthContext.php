<?php

namespace BlizzardApiService\Context;

class BlizzardOauthContext extends ApiContext
{
    private $clientId     = false;
    private $clientSecret = false;
    private $redirectUrl  = false;

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
    public function __construct($clientId, $clientSecret, $redirectUrl)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl  = $redirectUrl;
    }


    public function getAccessToken(){

    }
}