<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableClass extends Endpoint
{

    protected $endpointUrl = '/data/wow/playable-class/%d';
    protected $namespace   = true;

    public function __construct(int $classId)
    {
        $this->namespace = 'static-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($classId);
        parent::__construct();
    }
}
