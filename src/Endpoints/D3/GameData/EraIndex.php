<?php
namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class EraIndex extends Endpoint
{
    protected $endpointUrl = '/data/d3/era/';

    public function get(){
        return $this->sendRequest();
    }
}
