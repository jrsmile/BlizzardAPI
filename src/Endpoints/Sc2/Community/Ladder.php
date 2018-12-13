<?php
namespace BlizzardApiService\Endpoints\Sc2\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Ladder extends Endpoint
{
    protected $endpointUrl = '/sc2/ladder/%d';

    public function __construct(int $ladderId){
        $this->setUrl($ladderId);
        parent::__construct();
    }
}
