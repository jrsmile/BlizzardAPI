<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;

class BlizzardOauthContext extends ApiContext
{
    protected $redirectUrl  = false;
    protected $accessToken  = null;
    /**
     * @var array
     */
    protected $scopes;
    /**
     * @var
     */
    protected $region;
    protected $oAuthState;
    /**
     * @var
     */
    protected $locale;
    protected $code;
    protected $tokenValidUntil;

    /**
     * BlizzardOauthContext constructor.
     *
     * @param string $region
     * @param string $locale
     * @param string $redirectUrl
     * @param array $scopes
     */
    public function __construct($region, $locale, $redirectUrl, $scopes = [])
    {
        $this->redirectUrl  = $redirectUrl;
        $this->scopes       = $scopes;
        $this->region       = $region;
        $this->locale       = $locale;
    }

    public function getLoginUrl():string
    {
        $provider         = $this->getProvider();
        $authUrl          = $provider->getAuthorizationUrl();
        $this->oAuthState = $provider->getState();

        return $authUrl;
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
        if(!empty($this->accessToken)){
            return $this->accessToken;
        }

        $provider = $this->getProvider();
        try{
            /** @var AccessToken $accessToken */
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $this->code
            ]);
        }catch (IdentityProviderException $exception){
            return false;
        }
        $this->accessToken = $accessToken->getToken();
        $this->tokenValidUntil = $accessToken->getExpires();
        return $this->accessToken;
    }

    /**
     * @return object GenericProvider
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
            'scopes'                  => implode(' ', $this->scopes)
        ]);
    }


    public function setApiCredentials(string $clientId, string $clientSecret)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function setAccessToken(string $accessToken){
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getTokenValidUntil()
    {
        return $this->tokenValidUntil;
    }
}
