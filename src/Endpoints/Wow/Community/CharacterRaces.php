<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterRaces extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/races';

    public function get(){
        return $this->sendRequest();
    }
}