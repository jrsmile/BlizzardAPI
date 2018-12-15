<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicLeaderboardIndex extends Endpoint
{
    protected $endpointUrl = '/data/wow/connected-realm/%s/mythic-leaderboard/index';

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(string $connectedRealmId){
        $this->requestUrl = sprintf($this->endpointUrl, $connectedRealmId);
        return $this->sendRequest();
    }
}
