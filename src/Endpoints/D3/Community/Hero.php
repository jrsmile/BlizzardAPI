<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Hero extends Endpoint
{
    protected $endpointUrl = '/d3/profile/';

    public function get($battleTag, $heroId){
        $this->requestUrl .= $this->endpointUrl . urlencode($battleTag) . "/hero/$heroId";
        return $this->sendRequest();
    }
}
