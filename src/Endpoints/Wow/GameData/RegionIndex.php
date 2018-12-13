<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class RegionIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct()
    {
        $this->namespace  = 'dynamic-' . strtolower(BlizzardContext::getRegion());
        parent::__construct();
    }
}
