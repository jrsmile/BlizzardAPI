<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class GuildPerks extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/perks';

    public function get(){
        return $this->sendRequest();
    }
}