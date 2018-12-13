<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class HeroFollowerItems extends Endpoint
{
    protected $endpointUrl = '/d3/profile/%s/hero/%s/follower-items';

    public function __construct(string $battleTag, int $heroId)
    {
        $this->setUrl(urlencode($battleTag), $heroId);
        parent::__construct();
    }
}
