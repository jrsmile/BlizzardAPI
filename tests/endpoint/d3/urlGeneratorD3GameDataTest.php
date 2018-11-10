<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TestContext.php';

class urlGeneratorD3GameDataTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestOauthContext('EU', 'de_DE', '');
        $this->apiContext->setAccessToken($this->apiKey);
    }

    public function testEra(){
        $requestedId = 1;
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\Era($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/era/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testEraIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\EraIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/era/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testEraLeaderboard(){
        $requestedId1 = 1;
        $requestedId2 = 'achievement-points';
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\EraLeaderboard($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/era/$requestedId1/leaderboard/$requestedId2?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testSeason(){
        $requestedId = 1;
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\Season($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/season/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testSeasonIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\SeasonIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/season/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testSeasonLeaderboard(){
        $requestedId1 = 1;
        $requestedId2 = 'achievement-points';
        $api      = new \BlizzardApiService\Endpoints\D3\GameData\SeasonLeaderboard($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/data/d3/season/$requestedId1/leaderboard/$requestedId2?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}
