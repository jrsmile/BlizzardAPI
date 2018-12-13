<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Zone extends Endpoint
{
    protected $endpointUrl = '/wow/zone/%d';

    public function __construct(int $zoneId){
        $this->setUrl($zoneId);
        parent::__construct();
    }
}
