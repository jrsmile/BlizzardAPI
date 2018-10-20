<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 20.10.2018
 * Time: 12:40
 */

namespace BlizzardApiService\GameData;


use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoint;

class ConnectedRealmIndex extends Endpoint
{
    /** @var BlizzardApiContext|bool  */
    protected $apiContext  = false;

    protected $endpointUrl = '/data/wow/connected-realm/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->apiContext = $blizzardApiContext;
        $this->namespace  = 'dynamic-' . strtolower($this->apiContext->getRegion());
    }

    public function get(){
        return $this->_sendRequest();
    }
}