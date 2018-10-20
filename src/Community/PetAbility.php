<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class PetAbility extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/';

    public function get($abilityId){
        $this->endpointUrl .= $abilityId;
        return $this->_sendRequest();
    }
}