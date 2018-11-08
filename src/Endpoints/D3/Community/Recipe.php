<?php

namespace BlizzardApiService\Endpoints\D3\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Recipe extends Endpoint
{
    protected $endpointUrl = '/d3/data/artisan/';

    public function get($artisanSlug, $recipeSlug){
        $this->requestUrl .= "$artisanSlug/recipe/$recipeSlug";
        return $this->sendRequest();
    }
}