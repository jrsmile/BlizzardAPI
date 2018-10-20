<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class CharacterAchievements extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/achievements';

    public function get(){
        return $this->sendRequest();
    }
}