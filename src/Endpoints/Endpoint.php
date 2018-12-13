<?php

namespace BlizzardApiService\Endpoints;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Exceptions\ApiException;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;

class Endpoint implements \Countable
{
    protected $endpointUrl, $requestUrl, $namespace, $needsUserToken = false;
    protected $parameters, $fields, $data                          = [];
    private   $measureStart;

    public function __construct(){
        $this->sendRequest();
    }

    protected $wholeUrl    = false;

    public function setUrl(...$params)
    {
        array_unshift($params, $this->endpointUrl);
        $this->requestUrl = call_user_func_array('sprintf', $params);
    }

    /**
     * If you want to access another locale than you default locale, you can provide the locale you want to receive.
     * This persists until you provide another locale.
     *
     * @param string $locale
     * @return $this
     */
    public function overwriteLocale(string $locale)
    {
        $this->parameters['locale'] = $locale;
        return $this;
    }

    /**
     * @throws ApiException
     */
    protected function sendRequest():void
    {
        $finalUrl = $this->buildUrl();
        $this->parameters = [];
        try {
            $this->profilerStart();
            /** @var Response $response */
            $response = BlizzardContext::sendRequest($finalUrl, $this->needsUserToken);
            $this->profilerEnd($response->getStatusCode());
        }catch (ServerException $exception){
            $this->profilerEnd($exception->getCode());
            throw (new ApiException(
                'Error connecting to API: [' . $exception->getCode() . '] ', 0, $exception
            ));
        }catch (ClientException $exception){
            $this->profilerEnd($exception->getCode());
            throw (new ApiException(
                'Error connecting to API: [' . $exception->getCode() . '] ', 0, $exception
            ));
        }
        $this->handleResponse($response);
    }

    protected function buildUrl(){
        if($this->namespace !== false){
            $this->parameters['namespace'] = $this->namespace;
        }

        $defaultLocale = BlizzardContext::getLocale();
        if (!empty($defaultLocale) && !isset($this->parameters['locale'])){
            $this->parameters['locale']    = $defaultLocale;
        }

        $baseUrl = ApiUrls::getBaseUrl(BlizzardContext::getRegion());
        $url     = $baseUrl . $this->endpointUrl;

        if(!empty($this->requestUrl)){
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
        return $url . $splitter . urldecode(http_build_query($this->parameters));
    }

    protected function handleResponse(Response $response):void
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
        $data = json_decode((string) $response->getBody());
        if(is_object($data)) {
            $data = get_object_vars($data);
        }
        foreach ($data as $key => $value){
            $this->data[$key] = $value;
        }
    }

    protected function calcFields($fieldInt){
        $usedFields = [];
        $possibleFields = array_reverse($this->fields, true);
        foreach ($possibleFields as $fieldWorth => $field){
            if($fieldInt >= $fieldWorth){
                $usedFields[] = $field;
                $fieldInt    -= $fieldWorth;
            }
        }
        $usedFields = array_reverse($usedFields);
        return implode(',', $usedFields);
    }

    protected function profilerStart(){
        $profilingActive  = BlizzardContext::isProfiling();
        if($profilingActive){
            $this->measureStart = microtime(true);
        }
    }

    protected function profilerEnd($statusCode){
        $profilingActive  = BlizzardContext::isProfiling();
        if($profilingActive){
            $requestTime = microtime(true) - $this->measureStart;
            BlizzardContext::callHooks(get_class($this), $statusCode, $requestTime);
            return $requestTime;
        }
        return false;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }
}
