<?php

namespace BlizzardApiService\Community;

use BlizzardApiService\Endpoint;

class Recipe extends Endpoint
{
    protected $endpointUrl = '/wow/recipe/';

    public function get($recipeId){
        $this->endpointUrl .= $recipeId;
        return $this->sendRequest();
    }
}