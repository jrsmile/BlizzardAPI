<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Act extends Endpoint
{
    protected $endpointUrl = '/d3/data/act/';

    public function get($actId){
        $this->requestUrl .= $actId;
        return $this->sendRequest();
    }
}