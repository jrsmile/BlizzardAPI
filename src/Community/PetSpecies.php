<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class PetSpecies extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/';

    public function get($speciesId){
        $this->endpointUrl .= $speciesId;
        return $this->sendRequest();
    }
}