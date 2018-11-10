<?php

namespace BlizzardApiService\Endpoints;

use BlizzardApiService\Context\ApiContext;
use BlizzardApiService\Exceptions\ApiException;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;

class Endpoint
{
    protected $endpointUrl   = false;
    protected $requestUrl    = false;
    protected $language      = false;
    protected $namespace     = false;
    protected $parameters    = [];
    protected $retryCounter  = 0;
    protected $oldApi        = false;


    protected $wholeUrl    = false;

    /** @var ApiContext */
    protected $apiContext  = false;

    public function __construct(ApiContext $blizzardApiContext)
    {
        $this->apiContext = $blizzardApiContext;
        $this->parameters['locale']       = $this->apiContext->getLocale();
        $this->parameters['access_token'] = $this->apiContext->getAccessToken();
    }

    /**
     * @return mixed
     * @throws ApiException
     */
    protected function sendRequest()
    {
        if($this->namespace !== false){
            $this->parameters['namespace'] = $this->namespace;
        }

        $url = $this->buildUrl();

        $profilingActive  = $this->apiContext->isProfiling();
        $measureStart     = false;
        if($profilingActive){
            $measureStart = microtime(true);
        }

        $response = $this->doRequest($url);

        if($profilingActive){
            $requestTime = microtime(true) - $measureStart;
            $this->apiContext->addMeasurement(get_class(), $requestTime);
        }

        return $this->handleResponse($response);
    }

    private function buildUrl()
    {
        $baseUrl = ApiUrls::getBaseUrl($this->apiContext->getRegion(), $this->oldApi);
        $url     = $baseUrl . $this->endpointUrl;
        if($this->requestUrl !== false){
            $url = $baseUrl . $this->requestUrl;
            $this->requestUrl = false;
        }
        if( $this->wholeUrl !== false) {
            $url = $this->wholeUrl;
        }
        $splitter = '?';
        if(strpos($url, '?') !== false){
            $splitter = '&';
        }

        $this->parameters = [];
        return $url . $splitter . urldecode(http_build_query($this->parameters));
    }

    private function handleResponse(Response $response)
    {

        if($response->getStatusCode() !== 200){
            $responseBody = @json_decode((string) $response->getBody());
            if(json_last_error() == JSON_ERROR_NONE){
                $responseBody = false;
            }
            $exception = new ApiException(
                'Error connecting to API: ' . $response->getReasonPhrase(), $response->getStatusCode()
            );
            $exception->setApiResponse($responseBody);
            throw $exception;
        }
        return json_decode((string) $response->getBody());
    }

    public function doRequest($url){
        try {
            /** @var Response $response */
            $response = $this->apiContext->sendRequest($url);
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
        return $response;
    }
}
