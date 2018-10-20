<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class Spell extends Endpoint
{
    protected $endpointUrl = '/wow/spell/';

    public function get($spellId){
        $this->endpointUrl .= $spellId;
        return $this->_sendRequest();
    }
}