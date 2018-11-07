<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetAbility extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/';

    public function get($abilityId){
        $this->requestUrl .= $abilityId;
        return $this->sendRequest();
    }
}