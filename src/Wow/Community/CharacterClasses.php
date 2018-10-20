<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class CharacterClasses extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/classes';

    public function get(){
        return $this->sendRequest();
    }
}