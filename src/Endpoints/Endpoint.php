<?php

namespace BlizzardApiService\Endpoints;


use BlizzardApiService\Context\ApiContext;
use BlizzardApiService\Exceptions\ApiException;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Exception\ServerException;

class Endpoint
{
    protected $endpointUrl   = false;
    protected $requestUrl    = false;
    protected $language      = false;
    protected $namespace     = false;
    protected $parameters    = [];
    protected $retryCounter  = 0;


    protected $wholeUrl    = false;

    /** @var ApiContext */
    protected $apiContext  = false;

    public function __construct(ApiContext $blizzardApiContext)
    {
        $this->apiContext = $blizzardApiContext;
    }

    /**
     * @return mixed
     * @throws ApiException
     */
    protected function sendRequest(){
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

        $finalUrl         = $url . $splitter . urldecode(http_build_query($this->parameters));
        $this->parameters = [];
        $profilingActive  = $this->apiContext->isProfiling();
        $measureStart     = false;
        if($profilingActive){
            $measureStart = microtime(true);
        }

        try {
            $response = $this->apiContext->sendRequest($finalUrl);
        }catch (ServerException $exception){
            if($this->retryCounter <= $this->apiContext->getRetryLimit()){
                sleep($this->apiContext->getRetrySleepTime());
                $this->retryCounter++;
                return $this->sendRequest();
            }
            throw (new ApiException(
                'Error connecting to API: [' . $exception->getCode() . '] ', 0, $exception
            ));
        }
        $this->retryCounter = 0;

        if($profilingActive){
            $requestTime = microtime(true) - $measureStart;
            $this->apiContext->addMeasurement(get_class(), $requestTime);
        }

        if($response->getStatusCode() !== 200){
            $responseBody = @json_decode((string) $response->getBody());
            if(json_last_error() == JSON_ERROR_NONE){
                $responseBody = false;
            }
            throw (new ApiException(
                'Error connecting to API: [' . $response->getStatusCode() . '] ' . $response->getReasonPhrase()
            ))->setApiResponse($responseBody);
        }
        return json_decode((string) $response->getBody());
    }
}