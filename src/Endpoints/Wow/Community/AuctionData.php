<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class AuctionData extends Endpoint
{
    protected $endpointUrl = '/wow/auction/data/%s';

    public function __construct(string $realmSlug)
    {
        $this->setUrl($realmSlug);
        parent::__construct();
    }
}
