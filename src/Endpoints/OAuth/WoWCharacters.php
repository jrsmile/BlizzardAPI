<?php
namespace BlizzardApiService\Endpoints\OAuth;

use BlizzardApiService\Endpoints\Endpoint;

class WoWCharacters extends Endpoint
{
    protected $endpointUrl  = '/wow/user/characters';
    protected $needsUserToken = true;
}
