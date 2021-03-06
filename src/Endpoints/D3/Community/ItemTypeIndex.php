<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemTypeIndex extends Endpoint
{
    protected $endpointUrl = '/d3/data/item-type';

    public function get(){
        return $this->sendRequest();
    }
}
