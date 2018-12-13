<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Spell extends Endpoint
{
    protected $endpointUrl = '/wow/spell/%d';

    public function __construct(int $spellId){
        $this->setUrl($spellId);
        parent::__construct();
    }
}
