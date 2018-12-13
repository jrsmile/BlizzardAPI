<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class PlayableSpecialization extends Endpoint
{
    protected $endpointUrl = '/data/wow/playable-specialization/%d';
    protected $namespace   = true;

    public function __construct(int $specializationId)
    {
        $this->namespace  = 'static-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($specializationId);
        parent::__construct();
    }
}
