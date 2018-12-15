<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicKeystoneDungeon extends Endpoint
{
    protected $endpointUrl = '/data/wow/mythic-keystone/dungeon/%d';

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(int $dungeonId){
        $this->requestUrl = sprintf($this->endpointUrl, $dungeonId);
        return $this->sendRequest();
    }
}
