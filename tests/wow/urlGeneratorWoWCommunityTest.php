<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'TestContext.php';


final class urlGeneratorWoWCommunityTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestContext('foo', 'bar', 'EU', 'de_DE', $this->apiKey);
    }


    public function testAchievement(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Achievement($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/achievement/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testAuctionData(){
        $requestedRealm = 'test-realm';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\AuctionData($this->apiContext);
        $response = $api->get($requestedRealm);
        $assertedUrl = "https://eu.api.blizzard.com/wow/auction/data/$requestedRealm?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testBattlegroups(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Battlegroups($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/battlegroups/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testBoss(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Boss($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/boss/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testBossList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\BossList($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/boss/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterAchievements(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterAchievements($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/character/achievements?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterClasses(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterClasses($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/character/classes?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterRaces(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterRaces($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/character/races?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testCharacterProfile(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\CharacterProfile($this->apiContext);
        $response = $api->get('test-realm', 'test-character');
        $assertedUrl = "https://eu.api.blizzard.com/wow/character/test-realm/test-character?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
        $possibleFields = [
            1      => 'achievements',
            2      => 'appearance',
            4      => 'feed',
            8      => 'guild',
            16     => 'hunterPets',
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

        $howMany = rand(1, count($possibleFields));
        uksort($possibleFields, function() { return rand() > rand(); });
        $fields = 0;
        $assertedFields = [];

        foreach ($possibleFields as $key => $value){
            $fields += $key;
            $assertedFields[$key] = $value;

            if(count($assertedFields) == $howMany){
                break;
            }
        }

        ksort($assertedFields);
        $assertedFields =  implode(',', $assertedFields);
        $response = $api->get('test-realm', 'test-character', $fields);
        $assertedUrl = "https://eu.api.blizzard.com/wow/character/test-realm/test-character?fields=$assertedFields&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testGuildAchievements(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildAchievements($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/guild/achievements?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testGuildPerks(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildPerks($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/guild/perks?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testGuildRewards(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildRewards($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/guild/rewards?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testGuildProfile(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\GuildProfile($this->apiContext);

        $response = $api->get('test-realm', 'test-guild');
        $assertedUrl = "https://eu.api.blizzard.com/wow/guild/test-realm/test-guild?fields=members&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);

        $possibleFields = [
            1 => 'members',
            2 => 'achievements',
            4 => 'news',
            8 => 'challenge',
        ];

        $howMany = rand(1, count($possibleFields));
        uksort($possibleFields, function() { return rand() > rand(); });
        $fields = 0;
        $assertedFields = [];

        foreach ($possibleFields as $key => $value){
            $fields += $key;
            $assertedFields[$key] = $value;

            if(count($assertedFields) == $howMany){
                break;
            }
        }

        ksort($assertedFields);
        $assertedFields =  implode(',', $assertedFields);
        $response = $api->get('test-realm', 'test-guild', $fields);
        $assertedUrl = "https://eu.api.blizzard.com/wow/guild/test-realm/test-guild?fields=$assertedFields&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItem(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Item($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/item/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItemSet(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ItemSet($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/item/set/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testItemClasses(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ItemClasses($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/item/classes?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testLeaderboards(){
        $requestedId = '2vs2';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Leaderboards($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/leaderboard/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testMountList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\MountList($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/mount/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPetAbility(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetAbility($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/pet/ability/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPetList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetList($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/pet/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPetSpecies(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetSpecies($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/pet/species/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPetStats(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetStats($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/pet/stats/$requestedId?level=1&breedId=3&qualityId=1&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
        $level   = rand(1, 25);
        $breedId = rand(1, 5);
        $qualityId = rand(1, 3);
        $response = $api->get($requestedId, $level, $breedId, $qualityId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/pet/stats/$requestedId?level=$level&breedId=$breedId&qualityId=$qualityId&locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testPetTypes(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\PetTypes($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/pet/types?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testQuest(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Quest($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/quest/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRealmLeaderboard(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RealmLeaderboard($this->apiContext);
        $response = $api->get('test-realm');
        $assertedUrl = "https://eu.api.blizzard.com/wow/challenge/test-realm?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRealmStatus(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RealmStatus($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/realm/status?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRecipe(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Recipe($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/recipe/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testRegionLeaderboard(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\RegionLeaderboard($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/challenge/region?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testSpell(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Spell($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/spell/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testTalents(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Talents($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/data/talents?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testZone(){
        $requestedId = 123456;
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Zone($this->apiContext);
        $response = $api->get($requestedId);
        $assertedUrl = "https://eu.api.blizzard.com/wow/zone/$requestedId?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }

    public function testZoneList(){
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\ZoneList($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.api.blizzard.com/wow/zone/?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}