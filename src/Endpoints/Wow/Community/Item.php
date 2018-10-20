<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/wow/item/';

    public function get($itemId){
        $this->endpointUrl .= $itemId;
        return $this->sendRequest();
    }
}