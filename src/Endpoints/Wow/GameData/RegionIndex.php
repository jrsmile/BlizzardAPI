<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class RegionIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->sendRequest();
    }
}