<?php

namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Achievements extends Endpoint
{
    protected $endpointUrl = '/sc2/data/achievements';

    public function get(){
        return $this->sendRequest();
    }
}