<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Follower extends Endpoint
{
    protected $endpointUrl = '/d3/data/follower/';

    public function get($followerSlug){
        $this->endpointUrl .= $followerSlug;
        return $this->sendRequest();
    }
}