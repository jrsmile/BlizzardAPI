<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class Realm extends Endpoint
{
    protected $endpointUrl = '/data/wow/realm/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get($realmSlug){
        $this->requestUrl .= $this->endpointUrl . $realmSlug;
        return $this->sendRequest();
    }
}
