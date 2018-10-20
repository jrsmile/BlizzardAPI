<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class GuildRewards extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/rewards';

    public function get(){
        return $this->_sendRequest();
    }
}