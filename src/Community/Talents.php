<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class Talents extends Endpoint
{
    protected $endpointUrl = '/wow/data/talents';

    public function get(){
        return $this->sendRequest();
    }
}