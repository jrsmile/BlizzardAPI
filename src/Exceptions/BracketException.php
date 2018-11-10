<?php


namespace BlizzardApiService\Exceptions;


class BracketException extends \Exception
{
    public function __construct($bracket, $possible)
    {
        parent::__construct("The bracket '$bracket' is not one of the possible values [$possible].", 0, null);
    }
}
