<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterAchievements extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/achievements';

    public function get(){
        return $this->sendRequest();
    }
}