<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'TestResponse.php';

class TestContext extends \BlizzardApiService\Context\BlizzardContext
{
    protected static $accessToken = null;


    public static function getAccessToken(): \BlizzardApiService\Context\AccessToken
    {
        return self::$accessToken;
    }

    public static function sendRequest(string $finalUrl, bool $needsUserToken = false):object
    {
        $response = new TestResponse();
        $response->url = $finalUrl;
        return $response;
    }

    public static function setAccessToken(\BlizzardApiService\Context\AccessToken $accessToken): void
    {
        self::$accessToken = $accessToken;
    }
}