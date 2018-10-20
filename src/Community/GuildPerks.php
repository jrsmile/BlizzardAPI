<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class GuildPerks extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/perks';

    public function get(){
        return $this->sendRequest();
    }
}