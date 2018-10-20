<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetAbility extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/';

    public function get($abilityId){
        $this->endpointUrl .= $abilityId;
        return $this->sendRequest();
    }
}