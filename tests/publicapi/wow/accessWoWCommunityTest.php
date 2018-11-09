<?php
declare(strict_types=1);

use BlizzardApiService\Context\BlizzardApiContext;
use PHPUnit\Framework\TestCase;


final class accessWoWCommunityTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        global $clientId, $clientSecret;
        $this->apiContext = new BlizzardApiContext($clientId, $clientSecret, 'EU', 'de_DE');
        $this->apiContext->setRetries(10);
        $this->apiContext->setSleepTime(5);
    }


    public function testAchievement(){
        $requestedId = 2144;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Achievement($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testAuctionData(){
        $requestedRealm = 'malygos';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\AuctionData($this->apiContext);
        $response = (array)$api->get($requestedRealm);
        $this->assertEquals(1, count($response));
    }

    public function testBattlegroups(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Battlegroups($this->apiContext);
        $response = (array)$api->get();
        $this->assertEquals(1, count($response));
    }

    public function testBoss(){
        $requestedId = 24723;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Boss($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals('selin-fireheart', $response->urlSlug);
    }

    public function testBossList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\BossList($this->apiContext);
        $response = (array)$api->get();
        $this->assertEquals(1, count($response));
    }

    public function testCharacterAchievements(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterAchievements($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(13, count($response->achievements));
    }

    public function testCharacterClasses(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterClasses($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(12, count($response->classes));
    }

    public function testCharacterRaces(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterRaces($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(21, count($response->races));
    }

    public function testCharacterProfile(){
        $characterRealm = 'Malygos';
        $characterName  = 'Elendas';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile($this->apiContext);
        $response = $api->get($characterRealm, $characterName);
        $this->assertEquals($characterRealm, $response->realm);
        $this->assertEquals($characterName, $response->name);
        $possibleFields = [
            1      => 'achievements',
            2      => 'appearance',
            4      => 'feed',
            8      => 'guild',
            32     => 'items',
            64     => 'mounts',
            128    => 'pets',
            256    => 'petSlots',
            512    => 'professions',
            1024   => 'progression',
            2048   => 'pvp',
            4096   => 'quests',
            8192   => 'reputation',
            16384  => 'statistics',
            32768  => 'stats',
            65536  => 'talents',
            131072 => 'titles',
            262144 => 'audit',
        ];

        $response = (array)$api->get($characterRealm, $characterName,
            \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile::FIELD_ALL & ~\BlizzardApiService\Endpoints\Wow\Community\CharacterProfile::FIELD_HUNTER_PETS);

        foreach ($possibleFields as $possibleField){
            $checkData = (array)$response[$possibleField];
            $this->assertGreaterThanOrEqual(1, count($checkData));
        }
    }

    public function testGuildAchievements(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildAchievements($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(7, count($response->achievements));
    }

    public function testGuildPerks(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildPerks($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(5, count($response->perks));
    }

    public function testGuildRewards(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildRewards($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(64, count($response->rewards));
    }

    public function testGuildProfile(){
        $guildRealm = 'Malygos';
        $guildName  = 'Bewahrer der Allianz';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildProfile($this->apiContext);

        $response = $api->get($guildRealm, $guildName);
        $this->assertEquals($guildRealm, $response->realm);
        $this->assertEquals($guildName, $response->name);


        $possibleFields = [
            1 => 'members',
            2 => 'achievements',
            4 => 'news',
            8 => 'challenge',
        ];


        $response = (array)$api->get($guildRealm, $guildName, \BlizzardApiService\Endpoints\Wow\Community\GuildProfile::FIELD_ALL);


        foreach ($possibleFields as $possibleField){
            $checkData = (array)$response[$possibleField];
            $this->assertGreaterThanOrEqual(1, count($checkData));
        }
    }

    public function testItem(){
        $requestedId = 18803;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Item($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testItemSet(){
        $requestedId = 1060;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ItemSet($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testItemClasses(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ItemClasses($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(16, count($response->classes));
    }

    public function testLeaderboards(){
        $requestedId = '2v2';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Leaderboards($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertGreaterThanOrEqual(1, count($response->rows));
    }

    public function testMountList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\MountList($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(887, count($response->mounts));
    }

    public function testPetAbility(){
        $requestedId = 640;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetAbility($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPetList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetList($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1083, count($response->pets));
    }

    public function testPetSpecies(){
        $requestedId = 258;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetSpecies($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->speciesId);
    }

    public function testPetStats(){
        $requestedId = 258;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetStats($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->speciesId);
    }

    public function testPetTypes(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetTypes($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(10, count($response->petTypes));
    }

    public function testQuest(){
        $requestedId = 13146;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Quest($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRealmLeaderboard(){
        $realm    = 'Malygos';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RealmLeaderboard($this->apiContext);
        $response = $api->get($realm);
        $this->assertGreaterThanOrEqual(1, count($response->challenge));
    }

    public function testRealmStatus(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RealmStatus($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1, count($response->realms));
    }

    public function testRecipe(){
        $requestedId = 33994;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Recipe($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRegionLeaderboard(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RegionLeaderboard($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(1, count($response->challenge));
    }

    public function testSpell(){
        $requestedId = 17086;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Spell($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testTalents(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Talents($this->apiContext);
        $response = (array)$api->get();
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testZone(){
        $requestedId = 4131;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Zone($this->apiContext);
        $response = $api->get($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testZoneList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ZoneList($this->apiContext);
        $response = $api->get();
        $this->assertGreaterThanOrEqual(141, count($response->zones));
    }
}