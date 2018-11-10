<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterClassSkill extends Endpoint
{
    protected $endpointUrl = '/d3/data/hero/';

    public function get($classSlug, $skillSlug){
        $this->requestUrl .= $this->endpointUrl . "$classSlug/skill/$skillSlug";
        return $this->sendRequest();
    }
}
