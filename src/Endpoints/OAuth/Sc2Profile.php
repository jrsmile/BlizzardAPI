<?php
namespace BlizzardApiService\Endpoints\OAuth;

use BlizzardApiService\Endpoints\Endpoint;

class Sc2Profile extends Endpoint
{
    protected $endpointUrl = '/sc2/profile/user';
    protected $needsUserToken = true;
}
