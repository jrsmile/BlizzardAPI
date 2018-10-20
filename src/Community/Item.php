<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/wow/item/';

    public function get($itemId){
        $this->endpointUrl .= $itemId;
        return $this->sendRequest();
    }
}