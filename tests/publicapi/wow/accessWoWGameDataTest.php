<?php

declare(strict_types=1);

use BlizzardApiService\Context\BlizzardContext;
use PHPUnit\Framework\TestCase;

class accessWoWGameDataTest extends TestCase
{
    public function setUp(){
        BlizzardContext::setRegion('EU');
        BlizzardContext::setLocale('de_DE');
    }


    public function testConnectedRealm(){
        $requestedId = 1098;
        $response    = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealm($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testConnectedRealmIndex(){
        $response      = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealmIndex();
        $this->assertGreaterThanOrEqual(1, count($response->connected_realms));
    }

    public function testPlayableClass(){
        $requestedId = 7;
        $response    = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClass($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPlayableClassesIndex(){
        $response = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClassesIndex();
        $this->assertGreaterThanOrEqual(12, count($response->classes));
    }

    public function testPlayableSpecialization(){
        $requestedId = 262;
        $response    = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecialization($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPlayableSpecializationIndex(){
        $response = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecializationIndex();
        $this->assertGreaterThanOrEqual(36, count($response->character_specializations));
    }

    public function testRealm(){
        $realmName = 'malygos';
        $realmId   = 1098;
        $response  = new \BlizzardApiService\Endpoints\Wow\GameData\Realm($realmName);
        $this->assertEquals($realmId, $response->id);
    }

    public function testRealmIndex(){
        $response = new \BlizzardApiService\Endpoints\Wow\GameData\RealmIndex();
        $this->assertGreaterThanOrEqual(267, count($response->realms));
    }

    public function testRegion(){
        $requestedId = 3;
        $response    = new \BlizzardApiService\Endpoints\Wow\GameData\Region($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRegionIndex(){
        $response = new \BlizzardApiService\Endpoints\Wow\GameData\RegionIndex();
        $this->assertGreaterThanOrEqual(1, count($response->regions));
    }

    public function testTokenPrice(){
        $response = new \BlizzardApiService\Endpoints\Wow\GameData\TokenPrice();
        $this->assertGreaterThanOrEqual(1, $response->price);
    }
}
