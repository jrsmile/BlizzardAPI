<?php

namespace BlizzardApiService\Endpoints\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class MountList extends Endpoint
{
    protected $endpointUrl = '/wow/mount/';

    public function get(){
        return $this->sendRequest();
    }
}