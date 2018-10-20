<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class Achievement extends Endpoint
{
    protected $endpointUrl = '/wow/achievement/';

    public function get($achievementId){
        $this->endpointUrl .= $achievementId;
        return $this->sendRequest();
    }
}