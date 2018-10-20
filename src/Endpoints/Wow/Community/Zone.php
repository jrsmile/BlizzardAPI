<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Zone extends Endpoint
{
    protected $endpointUrl = '/wow/zone/';

    public function get($zoneId){
        $this->endpointUrl .= $zoneId;
        return $this->sendRequest();
    }
}