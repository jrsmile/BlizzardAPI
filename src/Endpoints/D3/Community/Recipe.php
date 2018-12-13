<?php
namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Recipe extends Endpoint
{
    protected $endpointUrl = '/d3/data/artisan/%s/recipe/%s';

    public function __construct(string $artisanSlug, string $recipeSlug)
    {
        $this->setUrl($artisanSlug, $recipeSlug);
        parent::__construct();
    }
}
