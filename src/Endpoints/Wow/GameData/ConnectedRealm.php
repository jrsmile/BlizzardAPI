<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class ConnectedRealm extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/%d';
    protected $namespace   = true;

    public function __construct(int $realmId)
    {
        $this->namespace  = 'dynamic-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($realmId);
        parent::__construct();
    }
}
