<?php

namespace BlizzardApiService\Context;

use BlizzardApiService\Settings\ApiUrls;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;

class BlizzardOauthContext extends ApiContext
{
    protected $clientId     = false;
    protected $clientSecret = false;
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

    /**
     * BlizzardOauthContext constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $region
     * @param string $locale
     * @param string $redirectUrl
     * @param array $scopes
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
            'scopes'                  => implode(' ', $this->scopes)
        ]);
    }
}
