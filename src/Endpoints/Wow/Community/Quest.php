<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Quest extends Endpoint
{
    protected $endpointUrl = '/wow/quest/';

    public function get($questId){
        $this->requestUrl .= $this->endpointUrl . $questId;
        return $this->sendRequest();
    }
}
