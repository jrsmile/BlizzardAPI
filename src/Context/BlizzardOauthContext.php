<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;

class BlizzardOauthContext extends ApiContext
{
    private $clientId     = false;
    private $clientSecret = false;
    private $redirectUrl  = false;
    private $accessToken  = null;
    /**
     * @var array
     */
    private $scopes;
    /**
     * @var
     */
    private $region;
    private $oAuthState;
    /**
     * @var
     */
    private $locale;
    private $code;

    /**
     * BlizzardOauthContext constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $region
     * @param string $redirectUrl
     * @param array  $scopes
     */
    public function __construct($clientId, $clientSecret, $region, $locale, $redirectUrl, $scopes = [])
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl  = $redirectUrl;
        $this->scopes       = $scopes;
        $this->region       = $region;
        $this->locale       = $locale;
    }

    public function getLoginUrl():string
    {
        $provider         = $this->getProvider();
        $this->oAuthState = $provider->getState();

        return $provider->getAuthorizationUrl();
    }

    /**
     * @return string
     */
    public function getOAuthState():string
    {
        return $this->oAuthState;
    }

    public function setCode(string $code):object {
        $this->code = $code;
        return $this;
    }


    /**
     * @return string
     */
    public function getAccessToken():string
    {
        $provider = $this->getProvider();
        try{
            $this->accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $this->code
            ]);
        }catch (IdentityProviderException $exception){
            return false;
        }
        return $this->accessToken;
    }

    /**
     * @return object
     */
    private function getProvider():object
    {
        return new GenericProvider([
            'clientId'                => $this->clientId,
            'clientSecret'            => $this->clientSecret,
            'redirectUri'             => $this->redirectUrl,
            'urlAuthorize'            => ApiUrls::getAuthUrl($this->region),
            'urlAccessToken'          => ApiUrls::getTokenUrl($this->region),
            'urlResourceOwnerDetails' => '',
            'scopes'                  => implode(',', $this->scopes)
        ]);
    }
}