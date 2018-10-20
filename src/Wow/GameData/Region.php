<?php

namespace BlizzardApiService\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoint;

class Region extends Endpoint
{

    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get($regionId){
        $this->endpointUrl .= $regionId;
        return $this->sendRequest();
    }
}