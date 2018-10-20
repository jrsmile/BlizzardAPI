<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class Zone extends Endpoint
{
    protected $endpointUrl = '/wow/zone/';

    public function get($zoneId){
        $this->endpointUrl .= $zoneId;
        return $this->sendRequest();
    }
}