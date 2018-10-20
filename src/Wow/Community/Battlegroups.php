<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class Battlegroups extends Endpoint
{
    protected $endpointUrl = '/wow/data/battlegroups/';

    public function get(){
        return $this->sendRequest();
    }
}