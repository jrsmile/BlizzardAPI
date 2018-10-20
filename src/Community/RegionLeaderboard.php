<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class RegionLeaderboard extends Endpoint
{
    protected $endpointUrl = '/wow/challenge/region';

    public function get(){
        return $this->sendRequest();
    }
}