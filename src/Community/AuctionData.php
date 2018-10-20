<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class AuctionData extends Endpoint
{
    protected $endpointUrl = '/wow/auction/data/';

    public function get($realmSlug){
        $this->endpointUrl .= $realmSlug;
        return $this->sendRequest();
    }
}