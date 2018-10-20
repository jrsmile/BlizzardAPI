<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class PetTypes extends Endpoint
{
    protected $endpointUrl = '/wow/data/pet/types';

    public function get(){
        return $this->sendRequest();
    }
}