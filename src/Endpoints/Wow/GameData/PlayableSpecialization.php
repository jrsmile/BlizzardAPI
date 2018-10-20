<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableSpecialization extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-specialization/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
        parent::__construct($blizzardApiContext);
    }

    public function get($specializationId){
        $this->endpointUrl .= $specializationId;
        return $this->sendRequest();
    }
}