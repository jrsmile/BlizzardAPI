<?php

namespace BlizzardApiService\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoint;

class PlayableClassesIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-class/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get(){
        return $this->_sendRequest();
    }
}