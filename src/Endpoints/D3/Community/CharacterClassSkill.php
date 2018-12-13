<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterClassSkill extends Endpoint
{
    protected $endpointUrl = '/d3/data/hero/%s/skill/%s';

    public function __construct(string $classSlug, string $skillSlug)
    {
        $this->setUrl($classSlug, $skillSlug);
        parent::__construct();
    }
}
