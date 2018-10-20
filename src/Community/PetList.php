<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class PetList extends Endpoint
{
    protected $endpointUrl = '/wow/pet/';

    public function get(){
        return $this->sendRequest();
    }
}