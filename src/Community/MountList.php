<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class MountList extends Endpoint
{
    protected $endpointUrl = '/wow/mount/';

    public function get(){
        return $this->_sendRequest();
    }
}