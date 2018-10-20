<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class CharacterRaces extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/races';

    public function get(){
        return $this->sendRequest();
    }
}