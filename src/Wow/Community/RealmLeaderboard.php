<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class RealmLeaderboard extends Endpoint
{
    protected $endpointUrl = '/wow/challenge/';

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->sendRequest();
    }
}