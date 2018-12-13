<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Artisan extends Endpoint
{
    protected $endpointUrl = '/d3/data/artisan/%s';

    public function __construct(string $artisanSlug)
    {
        $this->setUrl($artisanSlug);
        parent::__construct();
    }
}
