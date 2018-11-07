<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;


use BlizzardApiService\Context\ApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableSpecializationIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-specialization/';
    protected $namespace   = true;

    public function __construct(ApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
    }

    public function get(){
        return $this->sendRequest();
    }
}