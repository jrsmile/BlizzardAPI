<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;


use BlizzardApiService\Context\ApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class RegionIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct(ApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(){
        return $this->sendRequest();
    }
}