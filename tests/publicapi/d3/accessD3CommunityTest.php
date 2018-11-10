<?php
declare(strict_types=1);

use BlizzardApiService\Context\BlizzardApiContext;
use PHPUnit\Framework\TestCase;


final class accessD3CommunityTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        global $clientId, $clientSecret;
        $this->apiContext = new BlizzardApiContext('EU', 'de_DE');
        $this->apiContext->setApiCredentials($clientId, $clientSecret);
        $this->apiContext->setRetries(10);
        $this->apiContext->setSleepTime(5);
    }


    public function testAccount(){
        $requestedId = 'Elendarius#2728';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Account($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->battleTag);
    }

    public function testAct(){
        $requestedId = 1;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Act($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->number);
    }

    public function testActIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ActIndex($this->apiContext);
        $response = $api->get();
        $this->assertEquals(1, $response->acts[0]->number);
    }

    public function testArtisan(){
        $requestedId = 'blacksmith';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Artisan($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->slug);
    }

    public function testCharacterClass(){
        $requestedId = 'barbarian';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\CharacterClass($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->slug);
    }

    public function testCharacterClassSkill(){
        $requestedId1 = 'barbarian';
        $requestedId2 = 'bash';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\CharacterClassSkill($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->skill->slug);
    }

    public function testFollower(){
        $requestedId = 'templar';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Follower($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->slug);
    }

    public function testHero(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Hero($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->id);
    }

    public function testHeroFollowerItems(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\HeroFollowerItems($this->apiContext);
        $response = (array)$api->get($requestedId1, $requestedId2);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testHeroItems(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $api      = new \BlizzardApiService\Endpoints\D3\Community\HeroItems($this->apiContext);
        $response = (array)$api->get($requestedId1, $requestedId2);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testItem(){
        $requestedId = 'corrupted-ashbringer-Unique_Sword_2H_104_x1';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Item($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->slug . '-' . $response->id);
    }

    public function testItemType(){
        $requestedId = 'sword2h';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ItemType($this->apiContext);
        $response = (array)$api->get($requestedId);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testItemTypeIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ItemTypeIndex($this->apiContext);
        $response = (array)$api->get();
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testRecipe(){
        $requestedId1 = 'blacksmith';
        $requestedId2 = 'apprentice-flamberge';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\Recipe($this->apiContext);
        $response = $api->get($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->slug);
    }
}