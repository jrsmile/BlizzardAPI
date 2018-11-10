<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class GuildAchievements extends Endpoint
{
    protected $endpointUrl = '/wow/data/guild/achievements';

    public function get(){
        return $this->sendRequest();
    }
}
