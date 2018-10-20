<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class PetTypes extends Endpoint
{
    protected $endpointUrl = '/wow/data/pet/types';

    public function get(){
        return $this->sendRequest();
    }
}