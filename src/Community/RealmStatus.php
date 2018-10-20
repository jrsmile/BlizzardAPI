<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class RealmStatus extends Endpoint
{
    protected $endpointUrl = '/wow/realm/status';

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->_sendRequest();
    }
}