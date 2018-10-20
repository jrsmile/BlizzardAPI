<?php

namespace BlizzardApiService\Wow\Community;

use BlizzardApiService\Endpoint;

class MountList extends Endpoint
{
    protected $endpointUrl = '/wow/mount/';

    public function get(){
        return $this->sendRequest();
    }
}