<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class CharacterClass extends Endpoint
{
    protected $endpointUrl = '/d3/data/hero/%s';

    public function __construct(string $classSlug)
    {
        $this->setUrl($classSlug);
        parent::__construct();
    }
}
