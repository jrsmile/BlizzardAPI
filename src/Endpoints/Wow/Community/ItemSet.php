<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemSet extends Endpoint
{
    protected $endpointUrl = '/wow/item/set/';

    public function get($itemSetId){
        $this->requestUrl .= $this->endpointUrl . $itemSetId;
        return $this->sendRequest();
    }
}