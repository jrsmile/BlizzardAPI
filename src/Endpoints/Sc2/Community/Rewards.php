<?php

namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Rewards extends Endpoint
{
    protected $endpointUrl = '/sc2/data/rewards';

    public function get(){
        return $this->sendRequest();
    }
}
