<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Achievement extends Endpoint
{
    protected $endpointUrl = '/wow/achievement/';

    public function get($achievementId){
        $this->requestUrl = $this->endpointUrl . $achievementId;
        return $this->sendRequest();
    }
}
