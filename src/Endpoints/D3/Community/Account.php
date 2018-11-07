<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Account extends Endpoint
{
    protected $endpointUrl = '/d3/profile/';

    public function get($battleTag){
        $this->requestUrl .= urlencode($battleTag);
        return $this->sendRequest();
    }
}