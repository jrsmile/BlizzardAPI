<?php

namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class SeasonLeaderboard extends Endpoint
{
    protected $endpointUrl = '/data/d3/season/';

    public function get($seasonId, $leaderboard){
        $this->requestUrl .= "$seasonId/leaderboard/$leaderboard";
        return $this->sendRequest();
    }
}