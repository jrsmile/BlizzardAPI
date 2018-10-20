<?php

namespace BlizzardApiService\Endpoints\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableClass extends Endpoint
{

    protected $endpointUrl = '/data/wow/playable-class/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get($classId){
        $this->endpointUrl .= $classId;
        return $this->sendRequest();
    }
}