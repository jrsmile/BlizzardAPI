<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class Quest extends Endpoint
{
    protected $endpointUrl = '/wow/quest/';

    public function get($questId){
        $this->endpointUrl .= $questId;
        return $this->_sendRequest();
    }
}