<?php
namespace BlizzardApiService\Endpoints\Wow\Profile;

use BlizzardApiService\Context\BlizzardContext;
use BlizzardApiService\Endpoints\Endpoint;

class MythicKeystoneProfileSeason extends Endpoint
{
    protected $endpointUrl    = '/profile/wow/character/%s/%s/mythic-keystone-profile/season/%d';
    protected $namespace      = true;
    protected $needsUserToken = true;

    public function __construct(string $realmSlug, string $characterName, int $seasonId)
    {
        $this->namespace  = 'profile-' . strtolower(BlizzardContext::getRegion());
        $this->setUrl($realmSlug, $characterName, $seasonId);
        parent::__construct();
    }
}
