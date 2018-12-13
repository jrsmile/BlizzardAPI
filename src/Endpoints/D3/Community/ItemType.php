<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ItemType extends Endpoint
{
    protected $endpointUrl = '/d3/data/item-type/%s';

    public function __construct(string $itemTypeSlug)
    {
        $this->setUrl($itemTypeSlug);
        parent::__construct();
    }
}
