<?php
namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class SeasonLeaderboard extends Endpoint
{
    protected $endpointUrl = '/data/d3/season/%d/leaderboard/%d';

    public function __construct(int $seasonId, string $leaderboard)
    {
        $this->setUrl($seasonId, $leaderboard);
        parent::__construct();
    }
}
