<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class Region extends Endpoint
{

    protected $endpointUrl = '/data/wow/region/%d';
    protected $namespace   = true;

    public function __construct(int $regionId)
    {
        $this->namespace  = 'dynamic-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($regionId);
        parent::__construct();
    }
}
