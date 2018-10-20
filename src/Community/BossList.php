<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class BossList extends Endpoint
{
    protected $endpointUrl = '/wow/boss/';

    public function get(){
        return $this->sendRequest();
    }
}