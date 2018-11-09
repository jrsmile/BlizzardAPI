<?php

namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class SeasonIndex extends Endpoint
{
    protected $endpointUrl = '/data/d3/season/';

    public function get(){
        return $this->sendRequest();
    }
}
