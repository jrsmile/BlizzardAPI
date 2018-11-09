<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/wow/item/';

    public function get($itemId){
        $this->requestUrl = $this->endpointUrl . $itemId;
        return $this->sendRequest();
    }
}
