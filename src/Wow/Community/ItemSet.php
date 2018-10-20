<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class ItemSet extends Endpoint
{
    protected $endpointUrl = '/wow/item/set/';

    public function get($itemSetId){
        $this->endpointUrl .= $itemSetId;
        return $this->sendRequest();
    }
}