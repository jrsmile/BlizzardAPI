<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableSpecializationIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-specialization/';
    protected $namespace   = true;

    public function __construct()
    {
        $this->namespace  = 'static-' . strtolower(BlizzardContext::getRegion());
        parent::__construct();
    }
}
