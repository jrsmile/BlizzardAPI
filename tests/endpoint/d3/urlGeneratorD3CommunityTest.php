<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TestContext.php';


final class urlGeneratorD3CommunityTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        \BlizzardApiService\Context\BlizzardContext::setRegion('EU');
        \BlizzardApiService\Context\BlizzardContext::setLocale('de_DE');
        \BlizzardApiService\Context\BlizzardContext::setAccessToken(new \BlizzardApiService\Context\AccessToken('Foo', 0));
    }


    public function testAccount(){
        $requestedId = 'Battetag#1234';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Account($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/profile/".urlencode($requestedId)."/?locale=de_DE";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testAct(){
        $requestedId = 1;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Act($requestedId);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/act/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testActIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ActIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/act?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testArtisan(){
        $requestedId = 'blacksmith';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Artisan($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/artisan/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterClass(){
        $requestedId = 'barbarian';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\CharacterClass($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/hero/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterClassSkill(){
        $requestedId1 = 'barbarian';
        $requestedId2 = 'bash';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\CharacterClassSkill($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/hero/$requestedId1/skill/$requestedId2?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testFollower(){
        $requestedId = 'templar';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Follower($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/follower/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testHero(){
        $requestedId1 = 'Battetag#1234';
        $requestedId2 = 'name';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Hero($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/d3/profile/".urlencode($requestedId1)."/hero/$requestedId2?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testHeroFollowerItems(){
        $requestedId1 = 'Battetag#1234';
        $requestedId2 = 123456;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\HeroFollowerItems($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/d3/profile/".urlencode($requestedId1)."/hero/$requestedId2/follower-items?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testHeroItems(){
        $requestedId1 = 'Battetag#1234';
        $requestedId2 = 123456;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\HeroItems($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/d3/profile/".urlencode($requestedId1)."/hero/$requestedId2/items?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItem(){
        $requestedId = 'corrupted-ashbringer-Unique_Sword_2H_104_x1';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Item($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/item/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItemType(){
        $requestedId = 'sword2h';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ItemType($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/item-type/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItemTypeIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ItemTypeIndex($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/item-type?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRecipe(){
        $requestedId1 = 'blacksmith';
        $requestedId2 = 'apprentice-flamberge';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Recipe($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $assertedUrl = "https://eu.api.blizzard.com/d3/data/artisan/$requestedId1/recipe/$requestedId2?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}