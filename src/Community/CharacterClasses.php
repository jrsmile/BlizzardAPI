<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class CharacterClasses extends Endpoint
{
    protected $endpointUrl = '/wow/data/character/classes';

    public function get(){
        return $this->_sendRequest();
    }
}