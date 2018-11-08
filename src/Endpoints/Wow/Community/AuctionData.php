<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class AuctionData extends Endpoint
{
    protected $endpointUrl = '/wow/auction/data/';

    public function get($realmSlug){
        $this->requestUrl .= $this->endpointUrl . $realmSlug;
        return $this->sendRequest();
    }
}