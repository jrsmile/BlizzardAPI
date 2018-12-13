<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Account extends Endpoint
{
    protected $endpointUrl = '/d3/profile/%s/';

    public function __construct(string $battleTag)
    {
        $this->setUrl(urlencode($battleTag));
        parent::__construct();
    }
}
