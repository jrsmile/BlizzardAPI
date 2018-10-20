<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetList extends Endpoint
{
    protected $endpointUrl = '/wow/pet/';

    public function get(){
        return $this->sendRequest();
    }
}