<?php

namespace BlizzardApiService\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoint;

class RegionIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->_sendRequest();
    }
}