<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class ZoneList extends Endpoint
{
    protected $endpointUrl = '/wow/zone/';

    public function get(){
        return $this->sendRequest();
    }
}