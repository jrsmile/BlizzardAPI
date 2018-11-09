<?php
namespace BlizzardApiService\Endpoints\OAuth;

use BlizzardApiService\Context\BlizzardOauthContext;
use BlizzardApiService\Endpoints\Endpoint;

class WoWCharacters extends Endpoint
{
    /** @var BlizzardOauthContext */
    protected $apiContext  = false;
    protected $endpointUrl = '/wow/user/characters';
    protected $oldApi      = true;

    public function __construct(BlizzardOauthContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
    }

    public function get(){
        return $this->sendRequest();
    }
}