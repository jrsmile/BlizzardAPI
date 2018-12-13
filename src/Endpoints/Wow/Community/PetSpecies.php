<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetSpecies extends Endpoint
{
    protected $endpointUrl = '/wow/pet/species/%d';

    public function __construct(int $speciesId){
        $this->setUrl($speciesId);
        parent::__construct();
    }
}
