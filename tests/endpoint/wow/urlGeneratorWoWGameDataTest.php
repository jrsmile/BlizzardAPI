<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TestContext.php';

class urlGeneratorWoWGameDataTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestContext('EU', 'de_DE');
        $this->apiContext->setAccessToken($this->apiKey);
    }


    public function testConnectedRealm(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealm($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/connected-realm/$requestedId?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testConnectedRealmIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\ConnectedRealmIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/connected-realm/?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPlayableClass(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClass($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/playable-class/$requestedId?namespace=static-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPlayableClassesIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableClassesIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/playable-class/?namespace=static-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPlayableSpecialization(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecialization($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/playable-specialization/$requestedId?namespace=static-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPlayableSpecializationIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\PlayableSpecializationIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/playable-specialization/?namespace=static-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRealm(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\Realm($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/realm/$requestedId?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRealmIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\RealmIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/realm/?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRegion(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\Region($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/region/$requestedId?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRegionIndex(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\RegionIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/region/?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testTokenPrice(){
        $api      = new \BlizzardApiService\Endpoints\Wow\GameData\TokenPrice($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/wow/token/?namespace=dynamic-eu&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}
