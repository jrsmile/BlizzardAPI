<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'TestContext.php';


final class urlGeneratorOauthTest extends TestCase
{
    public $apiContext = null;
    public $apiKey     = null;
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestOauthContext('EU', 'de_DE', '');
        $this->apiContext->setAccessToken($this->apiKey);
    }


    public function testAccount(){
        $api      = new \BlizzardApiService\Endpoints\OAuth\Account($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.battle.net/account/user?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }


    public function testSc2Profile(){
        $api      = new \BlizzardApiService\Endpoints\OAuth\Sc2Profile($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.battle.net/sc2/profile/user?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }


    public function testWoWCharacters(){
        $api      = new \BlizzardApiService\Endpoints\OAuth\WoWCharacters($this->apiContext);
        $response = $api->get();
        $assertedUrl = "https://eu.battle.net/wow/user/characters?locale=de_DE&access_token={$this->apiKey}";
        $this->assertEquals($assertedUrl, $response->url);
    }
}