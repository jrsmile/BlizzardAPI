<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ZoneList extends Endpoint
{
    protected $endpointUrl = '/wow/zone/';

    public function get(){
        return $this->sendRequest();
    }
}