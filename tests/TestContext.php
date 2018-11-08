<?php
use BlizzardApiService\Context\ApiContext;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'TestResponse.php';

class TestContext extends ApiContext
{
    private $key = null;
    private $profilingData = [];
    public function __construct($apiKey)
    {
        $this->key = $apiKey;
    }

    public function getRegion(): string
    {
        return 'EU';
    }

    public function getLocale(): string
    {
        return 'de_DE';
    }

    public function getAccessToken(): string
    {
        return $this->key;
    }

    public function isProfiling(): bool
    {
        return true;
    }

    public function sendRequest($finalUrl):object
    {
        $response = new TestResponse();
        $response->url = $finalUrl;
        return $response;
    }

    /**
     * @param string $className
     * @param float $runtime
     */
    public function addMeasurement(string $className, float $runtime): void
    {
        if(!isset($this->profilingData[$className])){
            $this->profilingData[$className] = [];
        }
        $this->profilingData[$className][] = $runtime;
    }

    /**
     * @return array
     */
    public function getProfilingData(): array
    {
        $result = [];
        foreach ($this->profilingData as $endpoint => $data){
            $result[$endpoint] = [
                'min'   => min($data),
                'max'   => max($data),
                'avg'   => array_sum($data) / count($data),
                'count' => count($data),
            ];
        }
        return $result;
    }
}