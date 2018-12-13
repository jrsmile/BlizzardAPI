<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Quest extends Endpoint
{
    protected $endpointUrl = '/wow/quest/%d';

    public function __construct($questId){
        $this->setUrl($questId);
        parent::__construct();
    }
}
