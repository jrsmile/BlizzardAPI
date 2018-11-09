<?php

namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class Era extends Endpoint
{
    protected $endpointUrl = '/data/d3/era/';

    public function get($eraId){
        $this->requestUrl .= $this->endpointUrl . $eraId;
        return $this->sendRequest();
    }
}
