<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class RealmLeaderboard extends Endpoint
{
    protected $endpointUrl = '/wow/challenge/%s';

    public function __construct($realmSlug){
        $this->setUrl($realmSlug);
        parent::__construct();
    }
}
