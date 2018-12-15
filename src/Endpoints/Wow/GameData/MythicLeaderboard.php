<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicLeaderboard extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/%d/mythic-leaderboard/%d/period/%d';

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(int $connectedRealmId, int $dungeonId, int $periodId){
        $this->requestUrl = sprintf($this->endpointUrl, $connectedRealmId, $dungeonId, $periodId);
        return $this->sendRequest();
    }
}
