<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterClass extends Endpoint
{
    protected $endpointUrl = '/d3/data/hero/';

    public function get($classSlug){
        $this->endpointUrl .= $classSlug;
        return $this->sendRequest();
    }
}