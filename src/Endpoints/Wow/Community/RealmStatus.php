<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class RealmStatus extends Endpoint
{
    protected $endpointUrl = '/wow/realm/status';

    public function get(){
        return $this->sendRequest();
    }
}
