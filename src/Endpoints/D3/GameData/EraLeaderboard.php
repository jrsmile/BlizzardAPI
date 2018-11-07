<?php

namespace BlizzardApiService\Endpoints\D3\GameData;

use BlizzardApiService\Endpoints\Endpoint;

class EraLeaderboard extends Endpoint
{
    protected $endpointUrl = '/data/d3/era/';

    public function get($eraId, $leaderboard){
        $this->requestUrl .= "$eraId/leaderboard/$leaderboard";
        return $this->sendRequest();
    }
}