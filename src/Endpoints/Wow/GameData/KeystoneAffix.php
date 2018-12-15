<?php
namespace BlizzardApiService\Endpoints\Wow\GameData;

use BlizzardApiService\Context\BlizzardApiContext;
use BlizzardApiService\Endpoints\Endpoint;

class KeystoneAffix extends Endpoint
{
    protected $endpointUrl = '/data/wow/keystone-affix/%d';

    public function __construct(BlizzardApiContext $blizzardApiContext)
    {
        parent::__construct($blizzardApiContext);
        $this->namespace  = 'static-' . strtolower($this->apiContext->getRegion());
    }

    public function get(int $affixId){
        $this->requestUrl = sprintf($this->endpointUrl, $affixId);
        return $this->sendRequest();
    }
}
