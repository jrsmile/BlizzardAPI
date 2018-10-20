<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 20.10.2018
 * Time: 13:32
 */

namespace BlizzardApiService\Exceptions;


use Throwable;

class RegionException extends \Exception
{
    public function __construct($region)
    {
        $message = "Region $region not exists.";
        parent::__construct($message, 0, null);
    }
}