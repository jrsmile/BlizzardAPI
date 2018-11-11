<?php
use BlizzardApiService\Context\BlizzardApiContext;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'TestResponse.php';

class TestContext extends BlizzardApiContext
{
    protected $accessToken = null;
    protected $profilingData = [];


    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function sendRequest($finalUrl)
    {
        $response = new TestResponse();
        $response->url = $finalUrl;
        return $response;
    }

    public function setAccessToken($accessToken){
        $this->accessToken = $accessToken;
    }
}