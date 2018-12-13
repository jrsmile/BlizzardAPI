<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Hero extends Endpoint
{
    protected $endpointUrl = '/d3/profile/%s/hero/%d';

    public function __construct(string $battleTag, int $heroId)
    {
        $this->setUrl(urlencode($battleTag), $heroId);
        parent::__construct();
    }
}
