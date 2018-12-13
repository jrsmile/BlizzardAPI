<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableClassesIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-class/';
    protected $namespace   = true;

    public function __construct()
    {
        $this->namespace  = 'static-' . strtolower(BlizzardContext::getRegion());
        parent::__construct();
    }
}
