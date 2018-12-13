<?php
namespace BlizzardApiService\Endpoints\OAuth;

use BlizzardApiService\Endpoints\Endpoint;

class Account extends Endpoint
{
    protected $endpointUrl    = '/oauth/userinfo';
    protected $needsUserToken = true;
}
