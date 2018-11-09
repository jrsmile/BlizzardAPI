<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 20.10.2018
 * Time: 11:47
 */

namespace BlizzardApiService\Settings;


use BlizzardApiService\Exceptions\RegionException;

class ApiUrls
{

    private static $baseUrls = [
        'US'  => 'https://us.api.blizzard.com',
        'EU'  => 'https://eu.api.blizzard.com',
        'KR'  => 'https://kr.api.blizzard.com',
        'TW'  => 'https://tw.api.blizzard.com',
        'SEA' => 'https://sea.api.blizzard.com',
    ];

    private static $oldBaseUrls = [
        'US'  => 'https://us.api.battle.net',
        'EU'  => 'https://eu.api.battle.net',
        'KR'  => 'https://kr.api.battle.net',
        'TW'  => 'https://tw.api.battle.net',
        'SEA' => 'https://sea.api.battle.net',
    ];

    private static $authUrls = [
        'US'  => 'https://us.battle.net/oauth/authorize',
        'EU'  => 'https://eu.battle.net/oauth/authorize',
        'KR'  => 'https://kr.battle.net/oauth/authorize',
        'TW'  => 'https://tw.battle.net/oauth/authorize',
        'SEA' => 'https://sea.battle.net/oauth/authorize',
    ];

    private static $tokenUrls = [
        'US'  => 'https://us.battle.net/oauth/token',
        'EU'  => 'https://eu.battle.net/oauth/token',
        'KR'  => 'https://kr.battle.net/oauth/token',
        'TW'  => 'https://tw.battle.net/oauth/token',
        'SEA' => 'https://sea.battle.net/oauth/token',
    ];

    public static function getBaseUrl($region, $old = false)
    {
        $urls = $old ? self::$oldBaseUrls : self::$baseUrls;
        if (!isset($urls[$region])) {
            throw new RegionException($region);
        }
        return $urls[$region];
    }

    public static function getTokenUrl($region)
    {

        if (!isset(self::$tokenUrls[$region])) {
            throw new RegionException($region);
        }
        return self::$tokenUrls[$region];
    }

    public static function getAuthUrl($region)
    {

        if (!isset(self::$authUrls[$region])) {
            throw new RegionException($region);
        }
        return self::$authUrls[$region];
    }
}
