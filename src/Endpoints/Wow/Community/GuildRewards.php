<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class GuildRewards extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/rewards';

    public function get(){
        return $this->sendRequest();
    }
}