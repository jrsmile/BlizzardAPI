<?php
namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class Era extends Endpoint
{
    protected $endpointUrl = '/data/d3/era/%d';

    public function __construct(int $eraId)
    {
        $this->setUrl($eraId);
        parent::__construct();
    }
}
