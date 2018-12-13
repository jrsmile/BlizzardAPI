<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemSet extends Endpoint
{
    protected $endpointUrl = '/wow/item/set/%d';

    public function __construct(int $itemSetId){
        $this->setUrl($itemSetId);
        parent::__construct();
    }
}
