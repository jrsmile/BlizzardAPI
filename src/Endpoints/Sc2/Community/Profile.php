<?php

namespace BlizzardApiService\Endpoints\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Profile extends Endpoint
{
    protected $endpointUrl = '/sc2/profile/';

    public function get($profileId, $regionId, $name){
        $this->endpointUrl .= "$profileId/$regionId/$name";
        return $this->sendRequest();
    }
}