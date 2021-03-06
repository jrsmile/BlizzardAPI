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
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
    }

    public function get($classId){
        $this->requestUrl .= $this->endpointUrl . $classId;
        return $this->sendRequest();
    }
}
