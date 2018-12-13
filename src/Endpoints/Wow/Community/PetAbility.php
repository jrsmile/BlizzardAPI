<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetAbility extends Endpoint
{
    protected $endpointUrl = '/wow/pet/ability/%d';

    public function __construct(int $abilityId){
        $this->setUrl($abilityId);
        parent::__construct();
    }
}
