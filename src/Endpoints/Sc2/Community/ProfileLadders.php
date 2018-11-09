<?php

namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class ProfileLadders extends Endpoint
{
    protected $endpointUrl = '/sc2/profile/';

    public function get($profileId, $regionId, $name){
        $this->requestUrl .= "$profileId/$regionId/$name/ladders";
        return $this->sendRequest();
    }
}
