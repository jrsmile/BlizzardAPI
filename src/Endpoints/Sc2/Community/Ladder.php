<?php

namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Ladder extends Endpoint
{
    protected $endpointUrl = '/sc2/ladder/';

    public function get($ladderId){
        $this->requestUrl .= $ladderId;
        return $this->sendRequest();
    }
}
