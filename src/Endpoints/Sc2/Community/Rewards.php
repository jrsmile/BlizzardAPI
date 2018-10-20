<?php

namespace BlizzardApiService\Endpoints\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Rewards extends Endpoint
{
    protected $endpointUrl = '/sc2/data/rewards';

    public function get($achievementId){
        $this->endpointUrl .= $achievementId;
        return $this->sendRequest();
    }
}