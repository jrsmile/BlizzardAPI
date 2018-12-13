<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Act extends Endpoint
{
    protected $endpointUrl = '/d3/data/act/%d';

    public function __construct(int $actId)
    {
        $this->setUrl($actId);
        parent::__construct();
    }
}
