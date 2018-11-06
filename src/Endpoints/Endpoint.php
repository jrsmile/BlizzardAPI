<?php

namespace BlizzardApiService\Endpoints;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class Endpoint
{
    protected $endpointUrl   = false;
    protected $requestUrl    = false;
    protected $language      = false;
    protected $namespace     = false;
    protected $parameters    = [];


    protected $wholeUrl    = false;

    /** @var BlizzardApiContext */
    protected $apiContext  = false;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->apiContext = $blizzardApiContext;
    }

    protected function sendRequest($counter = 1){
        if( $this->wholeUrl === false) {
            if($this->requestUrl != false){
                $url = ApiUrls::getBaseUrl($this->apiContext->getRegion()) . $this->requestUrl;
                $this->requestUrl = false;
            }else{
                $url = ApiUrls::getBaseUrl($this->apiContext->getRegion()) . $this->endpointUrl;
            }
        }else{
            $url = $this->wholeUrl;
        }
        if($this->namespace !== false){
            $this->parameters['namespace'] = $this->namespace;
        }
        $this->parameters['locale']       = $this->apiContext->getLocale();
        $this->parameters['access_token'] = $this->apiContext->getAccessToken();
        if(strpos($url, '?') !== false){
            $splitter = '&';
        }else{
            $splitter = '?';
        }
        $finalUrl   = $url . $splitter . http_build_query($this->parameters);
        $client = new Client();

        if($this->apiContext->isProfiling()){
            $measureStart = microtime(true);
        }

        try {
            $response = $client->request('GET', $finalUrl);
        }catch (ServerException $exception){
            if($counter <= $this->apiContext->getRetryLimit()){
                sleep($this->apiContext->getRetrySleepTime());
                return $this->sendRequest(++$counter);
            }
            throw $exception;
        }

        if($this->apiContext->isProfiling()){
            $requestTime = microtime(true) - $measureStart;
            $this->apiContext->addMeasurement(get_class(), $requestTime);
        }

        if($response->getStatusCode() !== 200){
            throw new \Exception(
                'Error connecting to API: [' . $response->getStatusCode() . '] ' . $response->getReasonPhrase()
            );
        }
        return json_decode((string) $response->getBody());
    }
}