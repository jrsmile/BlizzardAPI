<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;


final class accessWoWCommunityTest extends TestCase
{
    public function setUp(){
        \BlizzardApiService\Context\BlizzardContext::setRegion('EU');
        \BlizzardApiService\Context\BlizzardContext::setLocale('de_DE');
    }


    public function testAchievement(){
        $requestedId = 2144;
        $api         = new \BlizzardApiService\Endpoints\Wow\Community\Achievement($requestedId);
        $this->assertEquals($requestedId, $api->id);
    }

    public function testAuctionData(){
        $requestedRealm = 'malygos';
        $response       = new \BlizzardApiService\Endpoints\Wow\Community\AuctionData($requestedRealm);
        $this->assertEquals(1, count($response));
    }

    public function testBattlegroups(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\Battlegroups();
        $this->assertEquals(1, count($response));
    }

    public function testBoss(){
        $requestedId = 24723;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\Boss($requestedId);
        $this->assertEquals('selin-fireheart', $response->urlSlug);
    }

    public function testBossList(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\BossList();
        $this->assertEquals(1, count($response));
    }

    public function testCharacterAchievements(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\CharacterAchievements();
        $this->assertGreaterThanOrEqual(13, count($response->achievements));
    }

    public function testCharacterClasses(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\CharacterClasses();
        $this->assertGreaterThanOrEqual(12, count($response->classes));
    }

    public function testCharacterRaces(){
        $response= new \BlizzardApiService\Endpoints\Wow\Community\CharacterRaces();
        $this->assertGreaterThanOrEqual(21, count($response->races));
    }

    public function testCharacterProfile(){
        $characterRealm = 'Malygos';
        $characterName  = 'Elendas';
        $response       = new \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile($characterRealm, $characterName);
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

        $response       = new \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile($characterRealm, $characterName,
            \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile::FIELD_ALL & ~\BlizzardApiService\Endpoints\Wow\Community\CharacterProfile::FIELD_HUNTER_PETS);

        foreach ($possibleFields as $possibleField){
            $checkData = $response->$possibleField;
            $this->assertGreaterThanOrEqual(1, count((array) $checkData));
        }
    }

    public function testGuildAchievements(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\GuildAchievements();
        $this->assertGreaterThanOrEqual(7, count($response->achievements));
    }

    public function testGuildPerks(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\GuildPerks();
        $this->assertGreaterThanOrEqual(5, count($response->perks));
    }

    public function testGuildRewards(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\GuildRewards();
        $this->assertGreaterThanOrEqual(64, count($response->rewards));
    }

    public function testGuildProfile(){
        $guildRealm = 'Malygos';
        $guildName  = 'Bewahrer der Allianz';
        $response   = new \BlizzardApiService\Endpoints\Wow\Community\GuildProfile($guildRealm, $guildName);
        $this->assertEquals($guildRealm, $response->realm);
        $this->assertEquals($guildName, $response->name);


        $possibleFields = [
            1 => 'members',
            2 => 'achievements',
            4 => 'news',
            8 => 'challenge',
        ];

        $response   = new \BlizzardApiService\Endpoints\Wow\Community\GuildProfile($guildRealm, $guildName,
            \BlizzardApiService\Endpoints\Wow\Community\GuildProfile::FIELD_ALL);


        foreach ($possibleFields as $possibleField){
            $checkData = $response->$possibleField;
            $this->assertGreaterThanOrEqual(1, count((array) $checkData));
        }
    }

    public function testItem(){
        $requestedId = 18803;
        $response      = new \BlizzardApiService\Endpoints\Wow\Community\Item($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testItemSet(){
        $requestedId = 1060;
        $response      = new \BlizzardApiService\Endpoints\Wow\Community\ItemSet($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testItemClasses(){
        $response      = new \BlizzardApiService\Endpoints\Wow\Community\ItemClasses();
        $this->assertGreaterThanOrEqual(16, count($response->classes));
    }

    public function testLeaderboards(){
        $requestedId = '2v2';
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\Leaderboards($requestedId);
        $this->assertGreaterThanOrEqual(1, count($response->rows));
    }

    public function testMountList(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\MountList();
        $this->assertGreaterThanOrEqual(887, count($response->mounts));
    }

    public function testPetAbility(){
        $requestedId = 640;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\PetAbility($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testPetList(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\PetList();
        $this->assertGreaterThanOrEqual(1083, count($response->pets));
    }

    public function testPetSpecies(){
        $requestedId = 258;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\PetSpecies($requestedId);
        $this->assertEquals($requestedId, $response->speciesId);
    }

    public function testPetStats(){
        $requestedId = 258;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\PetStats($requestedId);
        $this->assertEquals($requestedId, $response->speciesId);
    }

    public function testPetTypes(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\PetTypes();
        $this->assertGreaterThanOrEqual(10, count($response->petTypes));
    }

    public function testQuest(){
        $requestedId = 13146;
        $response      = new \BlizzardApiService\Endpoints\Wow\Community\Quest($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRealmLeaderboard(){
        $realm    = 'Malygos';
        $response      = new \BlizzardApiService\Endpoints\Wow\Community\RealmLeaderboard($realm);
        $this->assertGreaterThanOrEqual(1, count($response->challenge));
    }

    public function testRealmStatus(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\RealmStatus();
        $this->assertGreaterThanOrEqual(1, count($response->realms));
    }

    public function testRecipe(){
        $requestedId = 33994;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\Recipe($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testRegionLeaderboard(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\RegionLeaderboard();
        $this->assertGreaterThanOrEqual(1, count($response->challenge));
    }

    public function testSpell(){
        $requestedId = 17086;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\Spell($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testTalents(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\Talents();
        $this->assertGreaterThanOrEqual(1, count($response));
    }

    public function testZone(){
        $requestedId = 4131;
        $response    = new \BlizzardApiService\Endpoints\Wow\Community\Zone($requestedId);
        $this->assertEquals($requestedId, $response->id);
    }

    public function testZoneList(){
        $response = new \BlizzardApiService\Endpoints\Wow\Community\ZoneList();
        $this->assertGreaterThanOrEqual(141, count($response->zones));
    }
}