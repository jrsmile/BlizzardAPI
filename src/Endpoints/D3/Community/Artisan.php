<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Artisan extends Endpoint
{
    protected $endpointUrl = '/d3/data/artisan/';

    public function get($artisanSlug){
        $this->requestUrl .= $this->endpointUrl . $artisanSlug;
        return $this->sendRequest();
    }
}
