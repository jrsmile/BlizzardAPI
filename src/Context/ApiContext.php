<?php


namespace BlizzardApiService\Context;


use BlizzardApiService\Exceptions\ContextException;

class ApiContext
{
    public function getRegion():string
    {
        throw new ContextException(__FUNCTION__);
    }
    public function getLocale():string
    {
        throw new ContextException(__FUNCTION__);
    }
    public function getAccessToken():string
    {
        throw new ContextException(__FUNCTION__);
    }
    public function isProfiling():bool
    {
        throw new ContextException(__FUNCTION__);
    }
    public function sendRequest($finalUrl):object
    {
        throw new ContextException(__FUNCTION__);
    }
    public function getRetryLimit():int
    {
        throw new ContextException(__FUNCTION__);
    }
    public function getRetrySleepTime():int
    {
        throw new ContextException(__FUNCTION__);
    }
}