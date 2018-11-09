<?php

declare(strict_types=1);

use BlizzardApiService\Context\BlizzardApiContext;
use PHPUnit\Framework\TestCase;

class accessWoWGameDataTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        global $clientId, $clientSecret;
        $this->apiContext = new BlizzardApiContext($clientId, $clientSecret, 'EU', 'de_DE');
    }


    public function testConnectedRealm(){
        $requestedId = 1098;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealm($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testConnectedRealmIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealmIndex($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1, count($response->connected_realms));
    }

    public function testPlayableClass(){
        $requestedId = 7;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClass($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPlayableClassesIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClassesIndex($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(12, count($response->classes));
    }

    public function testPlayableSpecialization(){
        $requestedId = 262;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecialization($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPlayableSpecializationIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecializationIndex($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(36, count($response->character_specializations));
    }

    public function testRealm(){
        $realmName = 'malygos';
        $realmId   = 1098;
        $api       = new \BlizzardApiService\Endpoints\Wow\GameData\Realm($this->apiContext);
        $response  = $api->get($realmName);
        $this->assertEquals($realmId, $response->id);
    }

    public function testRealmIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\RealmIndex($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(267, count($response->realms));
    }

    public function testRegion(){
        $requestedId = 3;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\Region($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRegionIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\RegionIndex($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1, count($response->regions));
    }

    public function testTokenPrice(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\TokenPrice($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1, $response->price);
    }
}
