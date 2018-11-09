<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class ConnectedRealm extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get($realmId){
        $this->requestUrl .= $this->endpointUrl . $realmId;
        return $this->sendRequest();
    }
}