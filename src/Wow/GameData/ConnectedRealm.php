<?php

namespace BlizzardApiService\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoint;

class ConnectedRealm extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get($realmId){
        $this->endpointUrl .= $realmId;
        return $this->sendRequest();
    }
}