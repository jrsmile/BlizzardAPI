<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetSpecies extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/';

    public function get($speciesId){
        $this->endpointUrl .= $speciesId;
        return $this->sendRequest();
    }
}