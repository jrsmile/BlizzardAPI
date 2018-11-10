<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetSpecies extends Endpoint
{
    protected $endpointUrl = '/wow/pet/species/';

    public function get($speciesId){
        $this->requestUrl = $this->endpointUrl . $speciesId;
        return $this->sendRequest();
    }
}
