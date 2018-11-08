<?php


namespace BlizzardApiService\Exceptions;


class ContextException extends \Exception
{
    public function __construct($function)
    {
        parent::__construct("The method '$function' is not overwritten in the context you use.", 0, null);
    }
}