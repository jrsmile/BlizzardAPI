<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class GuildAchievements extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/achievements';

    public function get(){
        return $this->sendRequest();
    }
}