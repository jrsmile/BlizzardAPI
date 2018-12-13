<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/wow/item/%d';

    public function __construct(int $itemId)
    {
        $this->setUrl($itemId);
        parent::__construct();
    }
}
