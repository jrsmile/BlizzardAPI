<?php

namespace BlizzardApiService\Exceptions;


class RegionException extends \Exception
{
    public function __construct($region)
    {
        $message = "Region $region not exists.";
        parent::__construct($message, 0, null);
    }
}