<?php
namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Matches extends Endpoint
{
    protected $endpointUrl = '/sc2/profile/';

    public function get($profileId, $regionId, $name){
        $this->requestUrl = $this->endpointUrl . "$profileId/$regionId/$name/matches";
        return $this->sendRequest();
    }
}
