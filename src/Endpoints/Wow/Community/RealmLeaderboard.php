<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class RealmLeaderboard extends Endpoint
{
    protected $endpointUrl = '/wow/challenge/';

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->sendRequest();
    }
}