<?php


namespace BlizzardApiService\Context;

use GuzzleHttp\Client;

abstract class ApiContext
{
    protected $clientId      = false;
    protected $clientSecret  = false;
    protected $profiling     = false;
    protected $profilingData = [];
    protected $retries       = 3;
    protected $sleepTime     = 2;
    protected $region        = false;
    protected $locale        = false;
    protected $baseUrl       = false;

    /**
     * @return bool
     */
    public function isProfiling(): bool
    {
        return $this->profiling;
    }

    /**
     * @param bool $profiling
     */
    public function setProfiling(bool $profiling): void
    {
        $this->profiling = $profiling;
    }

    public function getLocale():string
    {
        return $this->locale;
    }

    public function getRetryLimit():int
    {
        return $this->retries;
    }

    public function getRetrySleepTime():int
    {
        return $this->sleepTime;
    }

    public function getRegion():string
    {
        return $this->region;
    }

    abstract public function getAccessToken();

    public function sendRequest($finalUrl)
    {
        $client = new Client();
        return $client->request('GET', $finalUrl);
    }


    /**
     * @param int $retries
     */
    public function setRetries(int $retries)
    {
        $this->retries = $retries;
    }

    /**
     * @param int $sleepTime
     */
    public function setSleepTime(int $sleepTime)
    {
        $this->sleepTime = $sleepTime;
    }

    public function setApiCredentials(string $clientId, string $clientSecret)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        return $this->getAccessToken();
    }
}
