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

class PlayableClass extends Endpoint
{
    /** @var BlizzardApiContext|bool  */
    protected $apiContext  = false;

    protected $endpointUrl = '/data/wow/playable-class/';
    protected $namespace   = true;

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        $this->apiContext = $blizzardApiContext;
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
    }

    public function get($classId){
        $this->endpointUrl .= $classId;
        return $this->_sendRequest();
    }
}