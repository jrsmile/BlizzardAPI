<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class Region extends Endpoint
{

    protected $endpointUrl = '/data/wow/region/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get($regionId){
        $this->requestUrl .= $this->endpointUrl . $regionId;
        return $this->sendRequest();
    }
}
