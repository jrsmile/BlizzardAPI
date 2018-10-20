<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Spell extends Endpoint
{
    protected $endpointUrl = '/wow/spell/';

    public function get($spellId){
        $this->endpointUrl .= $spellId;
        return $this->sendRequest();
    }
}