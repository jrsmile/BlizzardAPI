<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class GuildRewards extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/rewards';

    public function get(){
        return $this->sendRequest();
    }
}