<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Talents extends Endpoint
{
    protected $endpointUrl = '/wow/data/talents';

    public function get(){
        return $this->sendRequest();
    }
}