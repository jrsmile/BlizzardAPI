<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterClasses extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/classes';

    public function get(){
        return $this->sendRequest();
    }
}