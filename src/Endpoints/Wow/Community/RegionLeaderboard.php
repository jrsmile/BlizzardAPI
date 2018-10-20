<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class RegionLeaderboard extends Endpoint
{
    protected $endpointUrl = '/wow/challenge/region';

    public function get(){
        return $this->sendRequest();
    }
}