<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ActIndex extends Endpoint
{
    protected $endpointUrl = '/d3/data/act';

    public function get(){
        return $this->sendRequest();
    }
}
