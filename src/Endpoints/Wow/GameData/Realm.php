<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class Realm extends Endpoint
{
    protected $endpointUrl = '/data/wow/realm/%s';
    protected $namespace   = true;

    public function __construct(string $realmSlug)
    {
        $this->namespace  = 'dynamic-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($realmSlug);
        parent::__construct();
    }
}
