<?php


namespace BlizzardApiService\Exceptions;


class ApiException extends \Exception
{
    private $apiResponse = null;

    /**
     * @return object
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }

    /**
     * @param object $apiResponse
     */
    public function setApiResponse(object $apiResponse):void
    {
        $this->apiResponse = $apiResponse;
    }
}
