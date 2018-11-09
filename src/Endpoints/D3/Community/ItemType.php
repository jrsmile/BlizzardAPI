<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemType extends Endpoint
{
    protected $endpointUrl = '/d3/data/item-type/';

    public function get($itemTypeSlug){
        $this->requestUrl .= $itemTypeSlug;
        return $this->sendRequest();
    }
}
