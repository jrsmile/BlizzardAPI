<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Boss extends Endpoint
{
    protected $endpointUrl = '/wow/boss/%d';

    public function __construct(int $bossId)
    {
        $this->setUrl($bossId);
        parent::__construct();
    }
}
