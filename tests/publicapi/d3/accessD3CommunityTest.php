<?php
declare(strict_types=1);

use BlizzardApiService\Context\BlizzardContext;
use PHPUnit\Framework\TestCase;


final class accessD3CommunityTest extends TestCase
{
    public function setUp(){
        BlizzardContext::setRegion('EU');
        BlizzardContext::setLocale('de_DE');
    }


    public function testAccount(){
        $requestedId = 'Elendarius#2728';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Account($requestedId);
        $this->assertEquals($requestedId, $response->battleTag);
    }

    public function testAct(){
        $requestedId = 1;
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Act($requestedId);
        $this->assertEquals($requestedId, $response->number);
    }

    public function testActIndex(){
        $api      = new \BlizzardApiService\Endpoints\D3\Community\ActIndex();
        $this->assertEquals(1, $api->acts[0]->number);
    }

    public function testArtisan(){
        $requestedId = 'blacksmith';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Artisan($requestedId);
        $this->assertEquals($requestedId, $response->slug);
    }

    public function testCharacterClass(){
        $requestedId = 'barbarian';
        $api      = new \BlizzardApiService\Endpoints\D3\Community\CharacterClass($requestedId);
        $this->assertEquals($requestedId, $api->slug);
    }

    public function testCharacterClassSkill(){
        $requestedId1 = 'barbarian';
        $requestedId2 = 'bash';
        $response     = new \BlizzardApiService\Endpoints\D3\Community\CharacterClassSkill($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->skill->slug);
    }

    public function testFollower(){
        $requestedId = 'templar';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Follower($requestedId);
        $this->assertEquals($requestedId, $response->slug);
    }

    public function testHero(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $response     = new \BlizzardApiService\Endpoints\D3\Community\Hero($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->id);
    }

    public function testHeroFollowerItems(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $response     = new \BlizzardApiService\Endpoints\D3\Community\HeroFollowerItems($requestedId1, $requestedId2);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testHeroItems(){
        $requestedId1 = 'Elendarius#2728';
        $requestedId2 = 110347670;
        $response     = new \BlizzardApiService\Endpoints\D3\Community\HeroItems($requestedId1, $requestedId2);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testItem(){
        $requestedId = 'corrupted-ashbringer-Unique_Sword_2H_104_x1';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\Item($requestedId);
        $this->assertEquals($requestedId, $response->slug . '-' . $response->id);
    }

    public function testItemType(){
        $requestedId = 'sword2h';
        $response    = new \BlizzardApiService\Endpoints\D3\Community\ItemType($requestedId);
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testItemTypeIndex(){
        $response = new \BlizzardApiService\Endpoints\D3\Community\ItemTypeIndex();
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testRecipe(){
        $requestedId1 = 'blacksmith';
        $requestedId2 = 'apprentice-flamberge';
        $response     = new \BlizzardApiService\Endpoints\D3\Community\Recipe($requestedId1, $requestedId2);
        $this->assertEquals($requestedId2, $response->slug);
    }
}