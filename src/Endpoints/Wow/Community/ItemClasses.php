<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemClasses extends Endpoint
{
    protected $endpointUrl = '/wow/data/item/classes';

    public function get(){
        return $this->sendRequest();
    }
}