<?php


namespace BlizzardApiService\Endpoints;

class UrlDirect extends Endpoint
{
    public function get($url){
        $this->wholeUrl = $url;
        return $this->sendRequest();
    }
}