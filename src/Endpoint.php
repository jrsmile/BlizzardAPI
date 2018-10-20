<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 20.10.2018
 * Time: 12:43
 */

namespace BlizzardApiService;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Settings\ApiUrls;
use GuzzleHttp\Client;

class Endpoint
{
    protected $endpointUrl = false;
    protected $language    = false;
    protected $namespace   = false;

    /** @var BlizzardApiContext */
    protected $apiContext  = false;

    protected function _sendRequest(){
        $url        = ApiUrls::getBaseUrl($this->apiContext->getRegion()) . $this->endpointUrl;

        $parameters = [];
        if($this->namespace !== false){
            $parameters['namespace'] = $this->namespace;
        }
        $parameters['locale']       = $this->apiContext->getLocale();
        $parameters['access_token'] = $this->apiContext->getAccessToken();
        $finalUrl   = $url . '?' . http_build_query($parameters);
        $client = new Client();
        $response = $client->request('GET', $finalUrl);

        if($response->getStatusCode() !== 200){
            throw new \Exception(
                'Error connecting to API: [' . $response->getStatusCode() . '] ' . $response->getReasonPhrase()
            );
        }
        return json_decode((string) $response->getBody());
    }
}