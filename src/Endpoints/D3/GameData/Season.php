<?php

namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class Season extends Endpoint
{
    protected $endpointUrl = '/data/d3/season/';

    public function get($seasonId){
        $this->requestUrl .= $seasonId;
        return $this->sendRequest();
    }
}