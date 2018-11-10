<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetTypes extends Endpoint
{
    protected $endpointUrl = '/wow/data/pet/types';

    public function get(){
        return $this->sendRequest();
    }
}
