<?php
namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class EraLeaderboard extends Endpoint
{
    protected $endpointUrl = '/data/d3/era/%d/leaderboard/%s';

    public function __construct(int $eraId, string $leaderboard)
    {
        $this->setUrl($eraId, $leaderboard);
        parent::__construct();
    }
}
