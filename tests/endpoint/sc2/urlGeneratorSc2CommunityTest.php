<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TestContext.php';


final class urlGeneratorSc2CommunityTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestContext('EU', 'de_DE', $this->apiKey);
    }


    public function testAchievements(){
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\Achievements($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/sc2/achievements?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testLadder(){
        $requestedId = 1;
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\Ladder($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/sc2/ladder/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testMatches(){
        $requestedId1 = 1;
        $requestedId2 = 2;
        $requestedId3 = 'name';
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\Matches($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2, $requestedId3);
        $assertedUrl = "https://eu.api.blizzard.com/sc2/profile/$requestedId1/$requestedId2/$requestedId3/matches?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testProfile(){
        $requestedId1 = 1;
        $requestedId2 = 2;
        $requestedId3 = 'name';
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\Profile($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2, $requestedId3);
        $assertedUrl = "https://eu.api.blizzard.com/sc2/profile/$requestedId1/$requestedId2/$requestedId3/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testProfileLadders(){
        $requestedId1 = 1;
        $requestedId2 = 2;
        $requestedId3 = 'name';
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\ProfileLadders($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2, $requestedId3);
        $assertedUrl = "https://eu.api.blizzard.com/sc2/profile/$requestedId1/$requestedId2/$requestedId3/ladders?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRewards(){
        $api      = new \BlizzardApiService\Endpoints\Sc2\Community\Rewards($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/sc2/data/rewards?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}