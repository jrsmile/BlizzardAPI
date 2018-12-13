<?php
namespace BlizzardApiService\Endpoints\Wow\Community;

use BlizzardApiService\Endpoints\Endpoint;

class Recipe extends Endpoint
{
    protected $endpointUrl = '/wow/recipe/%d';

    public function __construct($recipeId){
        $this->setUrl($recipeId);
        parent::__construct();
    }
}
