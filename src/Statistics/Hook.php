<?php
namespace BlizzardApiService\Statistics;

class Hook
{
    static $hooks = [];

    public static function addHook($closure){
        self::$hooks[] = $closure;
    }

    public static function callHooks($endpoint, $responseCode, $requestTime = null){
        foreach (self::$hooks as $hook){
            $hook($endpoint, $responseCode, $requestTime);
        }
    }
}