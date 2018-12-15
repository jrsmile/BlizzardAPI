<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicKeystoneSeason extends Endpoint
{
    protected $endpointUrl = '/data/wow/mythic-keystone/season/%d';

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(int $seasonId){
        $this->requestUrl = sprintf($this->endpointUrl, $seasonId);
        return $this->sendRequest();
    }
}
