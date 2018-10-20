<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class PetStats extends Endpoint
{
    protected $endpointUrl = '/wow/pet/stats/';

    public function get($speciesId, $level = 1, $breedId = 3, $qualityId = 1){
        $this->endpointUrl            .= $speciesId;
        $this->parameters['level']     = $level;
        $this->parameters['breedId']   = $breedId;
        $this->parameters['qualityId'] = $qualityId;
        return $this->sendRequest();
    }
}