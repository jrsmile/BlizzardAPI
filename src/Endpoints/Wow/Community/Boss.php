<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Boss extends Endpoint
{
    protected $endpointUrl = '/wow/boss/';

    public function get($bossId){
        $this->requestUrl .= $bossId;
        return $this->sendRequest();
    }
}