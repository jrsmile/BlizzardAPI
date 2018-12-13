<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Follower extends Endpoint
{
    protected $endpointUrl = '/d3/data/follower/%s';

    public function __construct(string $followerSlug)
    {
        $this->setUrl($followerSlug);
        parent::__construct();
    }
}
