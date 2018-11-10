<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class GuildProfile extends Endpoint
{
    const FIELD_ALL          = 15;
    const FIELD_MEMBERS      = 1;
    const FIELD_ACHIEVEMENTS = 2;
    const FIELD_NEWS         = 4;
    const FIELD_CHALLENGE    = 8;

    protected $fields = [
        1 => 'members',
        2 => 'achievements',
        4 => 'news',
        8 => 'challenge',
    ];

    protected $endpointUrl = '/wow/guild/';

    public function get($realmSlug, $guildName, $fieldInt = self::FIELD_MEMBERS){
        $this->parameters['fields'] = $this->calcFields($fieldInt);
        $this->requestUrl          .= $this->endpointUrl . $realmSlug . '/' . $guildName;
        return $this->sendRequest();
    }
}
