<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class Boss extends Endpoint
{
    protected $endpointUrl = '/wow/boss/';

    public function get($bossId){
        $this->endpointUrl .= $bossId;
        return $this->sendRequest();
    }
}