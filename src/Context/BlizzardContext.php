<?php


namespace BlizzardApiService\Context;


use BlizzardApiService\Exceptions\ApiException;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;


class BlizzardContext
{
    private static $apiClient, $apiSecret, $accessToken, $region, $locale, $userAccessToken, $oAuthState,
        $oauthScopes, $redirectUrl, $code, $userTokenValidUntil;

    private static $profiling = false;
    private static $hooks = [];

    /**
     * Set the API Credentials
     *
     * @param string $apiClient your client id
     * @param string $apiSecret your client secret
     */
    public static function setApiCredentials(string $apiClient, string $apiSecret): void
    {
        self::$apiClient = $apiClient;
        self::$apiSecret = $apiSecret;
    }

    /**
     * Set the default locale for this api, if you do not set one the Blizzard APIs always returning english responses.
     * @param string $locale
     */
    public static function setLocale(string $locale): void
    {

        self::$locale = $locale;
    }

    public static function getLocale(): ?string
    {
        return self::$locale;
    }

    public static function setRegion(string $region): void
    {
        self::$region = $region;
    }

    public static function getRegion(): string
    {
        return self::$region;
    }

    public static function setProfiling(bool $profiling): void
    {
        self::$profiling = $profiling;
    }

    public static function isProfiling(): bool
    {
        return self::$profiling;
    }


    /**
     * Set a valid access token
     *
     * @param AccessToken $accessToken the access token you received earlier
     */
    public static function setAccessToken(AccessToken $accessToken): void
    {
        self::$accessToken = $accessToken;
    }

    /**
     * @return AccessToken access token stored or received from Blizzard
     * @throws ApiException
     */
    public static function getAccessToken(): AccessToken
    {
        if (!empty(self::$accessToken)) {
            return self::$accessToken;
        }

        if (getenv('BLIZZARD_API_CLIENT_ID') && getenv('BLIZZARD_API_CLIENT_SECRET')) {
            self::$apiClient = getenv('BLIZZARD_API_CLIENT_ID');
            self::$apiSecret = getenv('BLIZZARD_API_CLIENT_SECRET');
        }

        if (!empty(self::$apiClient) && !empty(self::$apiSecret)) {
            $response = self::callApi(
                ApiUrls::getTokenUrl(self::$region) . '?grant_type=client_credentials',
                [
                    'Authorization' => 'Basic ' . base64_encode(
                            self::$apiClient . ":" . self::$apiSecret
                        ),
                ]
            );
            if ($response->getStatusCode() !== 200) {
                throw new ApiException(
                    'Error connecting to API: ' . $response->getReasonPhrase(), $response->getStatusCode()
                );
            }
            $result = json_decode((string)$response->getBody());
            self::$accessToken = new AccessToken($result->access_token, time() + $result->expires_in);
            return self::$accessToken;
        }
        throw new ApiException('No API credentials given, please provide a access key'
            . ' or clientId and clientSecret');
    }

    private static function callApi($url, $headers)
    {
        $client = new Client();
        try {
            $response = $client->request(
                'POST', $url,
                [
                    'headers' => $headers
                ]
            );
        } catch (ClientException $exception) {
            throw (new ApiException(
                'Error connecting to API: ' . $exception->getMessage(),
                $exception->getCode(),
                $exception)
            );
        }
        return $response;
    }

    public static function getUserAccessToken(): string
    {
        if (!empty(self::$userAccessToken)) {
            return self::$userAccessToken;
        }

        throw new ApiException('Got no user specific access token, please provide one via ::setUserAccessToken()');
    }

    public static function setUserAccessToken(string $userAccessToken): void
    {
        self::$userAccessToken = $userAccessToken;
    }

    public static function sendRequest(string $finalUrl, bool $needsUserToken = false): object
    {
        $token = self::getAccessToken();
        if ($needsUserToken) {
            $token = self::getUserAccessToken();
        }
        $response = self::callApi($finalUrl,[
            'Authorization' => 'Bearer ' . $token,
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new ApiException(
                'Error connecting to API: ' . $response->getReasonPhrase(), $response->getStatusCode()
            );
        }
        return $response;
    }

    public static function getOauthUrl(string $region, string $redirectUrl, array $scopes): string
    {
        $provider         = self::getProvider();
        $authUrl          = $provider->getAuthorizationUrl();
        self::$oAuthState = $provider->getState();

        return $authUrl;
    }

    public static function getOAuthState():string
    {
        return self::$oAuthState;
    }


    public static function setCode(string $code):void {
        self::$code = $code;
    }

    /**
     * @return string
     */
    public static function getOauthAccessToken():string
    {
        if(!empty(self::$userAccessToken)){
            return self::$userAccessToken;
        }

        $provider = self::getProvider();
        try{
            /** @var AccessToken $accessToken */
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' =>  self::$code
            ]);
        }catch (IdentityProviderException $exception){
            return false;
        }
        self::$userAccessToken     = $accessToken->getToken();
        self::$userTokenValidUntil = $accessToken->getExpires();
        return self::$userTokenValidUntil;
    }

    public static function addHook($closure)
    {
        self::$hooks[] = $closure;
        BlizzardContext::setProfiling(true);
    }

    public static function callHooks($endpoint, $responseCode, $requestTime = null)
    {
        foreach (self::$hooks as $hook) {
            $hook($endpoint, $responseCode, $requestTime);
        }
    }

        /**
         * @return object GenericProvider
         */
    private static function getProvider():object
    {
        return new GenericProvider([
            'clientId'                => self::$apiClient,
            'clientSecret'            => self::$apiSecret,
            'redirectUri'             => self::$redirectUrl,
            'urlAuthorize'            => ApiUrls::getAuthUrl(self::$region),
            'urlAccessToken'          => ApiUrls::getTokenUrl(self::$region),
            'urlResourceOwnerDetails' => '',
            'scopes'                  => implode(' ', self::$oauthScopes)
        ]);
    }
}