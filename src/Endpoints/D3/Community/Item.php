<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Item extends Endpoint
{
    protected $endpointUrl = '/d3/data/item/%s';

    public function __construct(string $itemSlugAndId)
    {
        $this->setUrl(urlencode($itemSlugAndId));
        parent::__construct();
    }
}
