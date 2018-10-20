<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class RealmStatus extends Endpoint
{
    protected $endpointUrl = '/wow/realm/status';

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->sendRequest();
    }
}