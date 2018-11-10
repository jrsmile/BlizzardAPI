<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class BossList extends Endpoint
{
    protected $endpointUrl = '/wow/boss/';

    public function get(){
        return $this->sendRequest();
    }
}
