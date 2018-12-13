<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class ConnectedRealmIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/';
    protected $namespace   = true;

    public function __construct()
    {
        $this->namespace  = 'dynamic-' . strtolower(BlizzardContext::getRegion());
        parent::__construct();
    }
}
