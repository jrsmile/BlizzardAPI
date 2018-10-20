<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class ItemClasses extends Endpoint
{
    protected $endpointUrl = '/wow/data/item/classes';

    public function get(){
        return $this->sendRequest();
    }
}