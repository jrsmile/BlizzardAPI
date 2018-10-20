<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class ConnectedRealmIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get(){
        return $this->sendRequest();
    }
}