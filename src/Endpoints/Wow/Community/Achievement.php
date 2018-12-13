<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Achievement extends Endpoint
{
    protected $endpointUrl = '/wow/achievement/%d';

    public function __construct(int $achievementId)
    {
        $this->setUrl($achievementId);
        parent::__construct();
    }
}
