<?php

namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Recipe extends Endpoint
{
    protected $endpointUrl = '/wow/recipe/';

    public function get($recipeId){
        $this->requestUrl .= $this->endpointUrl . $recipeId;
        return $this->sendRequest();
    }
}