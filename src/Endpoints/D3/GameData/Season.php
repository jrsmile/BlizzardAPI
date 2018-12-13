<?php
namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class Season extends Endpoint
{
    protected $endpointUrl = '/data/d3/season/%d';

    public function __construct(int $seasonId)
    {
        $this->setUrl($seasonId);
        parent::__construct();
    }
}
