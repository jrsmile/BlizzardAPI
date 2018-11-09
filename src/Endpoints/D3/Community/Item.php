<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/d3/data/item/';

    public function get($itemSlugAndId){
        $this->requestUrl .= urlencode($itemSlugAndId);
        return $this->sendRequest();
    }
}
