<?php
namespace BlizzardApiService\Endpoints\Wow\Profile;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicKeystoneProfile extends Endpoint
{
    protected $endpointUrl    = '/profile/wow/character/%s/%s/mythic-keystone-profile';
    protected $namespace      = true;
    protected $needsUserToken = true;

    public function __construct(string $realmSlug, string $characterName)
    {
        $this->namespace  = 'profile-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($realmSlug, $characterName);
        parent::__construct();
    }
}
