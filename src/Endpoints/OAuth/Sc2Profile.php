<?php
namespace BlizzardApiService\Endpoints\OAuth;

use BlizzardApiService\Context\BlizzardOauthContext;
use BlizzardApiService\Endpoints\Endpoint;

class Sc2Profile extends Endpoint
{
    /** @var BlizzardOauthContext */
    protected $apiContext  = false;
    protected $endpointUrl = '/sc2/profile/user';
    protected $oldApi      = true;

    public function __construct(BlizzardOauthContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
    }

    public function get(){
        return $this->sendRequest();
    }
}