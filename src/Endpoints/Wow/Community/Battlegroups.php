<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Battlegroups extends Endpoint
{
    protected $endpointUrl = '/wow/data/battlegroups/';

    public function get(){
        return $this->sendRequest();
    }
}
