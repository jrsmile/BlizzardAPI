<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetStats extends Endpoint
{
    protected $endpointUrl = '/wow/pet/stats/%d';

    public function __construct(int $speciesId, int $level = 1, int $breedId = 3, int $qualityId = 1){
        $this->parameters['level']     = $level;
        $this->parameters['breedId']   = $breedId;
        $this->parameters['qualityId'] = $qualityId;
        $this->setUrl($speciesId);
        parent::__construct();
    }
}
