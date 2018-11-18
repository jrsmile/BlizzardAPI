<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;


class generalTest extends TestCase
{
    /** @var \BlizzardApiService\Context\ApiContext */
    public $apiContext = null;
    public $apiKey     = null;
    public $region     = 'EU';
    public $locale     = 'de_DE';
    public function setUp(){
        $this->apiKey = md5((string)rand(0, 100));
        $this->apiContext = new TestContext($this->region, $this->locale);
        $this->apiContext->setAccessToken($this->apiKey);
        $this->apiContext->setProfiling(true);
    }

    public function testLeaderboardsException(){
        $this->expectException(\BlizzardApiService\Exceptions\BracketException::class);
        $requestedId = '2vs2';
        $api      = new \BlizzardApiService\Endpoints\Wow\Community\Leaderboards($this->apiContext);
        $api->get($requestedId);
    }

    public function testRegionExceptionBaseUrl(){
        $this->expectException(\BlizzardApiService\Exceptions\RegionException::class);
        \BlizzardApiService\Settings\ApiUrls::getBaseUrl('FOO');
    }

    public function testRegionExceptionAuthUrl(){
        $this->expectException(\BlizzardApiService\Exceptions\RegionException::class);
        \BlizzardApiService\Settings\ApiUrls::getAuthUrl('FOO');
    }

    public function testRegionExceptionTokenUrl(){
        $this->expectException(\BlizzardApiService\Exceptions\RegionException::class);
        \BlizzardApiService\Settings\ApiUrls::getTokenUrl('FOO');
    }

    public function testApiException(){
        $this->expectException(\BlizzardApiService\Exceptions\ApiException::class);
        $apiContext = new \BlizzardApiService\Context\BlizzardApiContext('EU', 'de_DE');
        $apiContext->getAccessToken();
    }

    public function testApiException2(){
        $exception = new \BlizzardApiService\Exceptions\ApiException();
        $responseAsserted = new Exception();
        $exception->setApiResponse($responseAsserted);
        $response = $exception->getApiResponse();
        $this->assertEquals($response, $responseAsserted);
    }

    public function testApiUrls(){
        $url = \BlizzardApiService\Settings\ApiUrls::getBaseUrl('EU');
        $this->assertNotEmpty($url);
        $url = \BlizzardApiService\Settings\ApiUrls::getBaseUrl('EU', true);
        $this->assertNotEmpty($url);
        $url = \BlizzardApiService\Settings\ApiUrls::getTokenUrl('EU');
        $this->assertNotEmpty($url);
        $url = \BlizzardApiService\Settings\ApiUrls::getAuthUrl('EU');
        $this->assertNotEmpty($url);
    }

    public function testContext(){
        $region = $this->apiContext->getRegion();
        $this->assertEquals($this->region, $region);
        $locale = $this->apiContext->getLocale();
        $this->assertEquals($this->locale, $locale);
    }

    public function testApiContext(){

        $apiContext = new TestContext('EU', 'de_DE');
        $apiContext->setAccessToken('foo');
        $this->assertEquals('foo', $apiContext->getAccessToken());

        $this->assertFalse($apiContext->isProfiling());

        $apiContext->setProfiling(true);
        $this->assertTrue($apiContext->isProfiling());

        $this->assertEquals('EU', $apiContext->getRegion());
        $this->assertEquals('de_DE', $apiContext->getLocale());
        $apiContext->setRetries(5);
        $this->assertEquals(5, $apiContext->getRetryLimit());

        $apiContext->setSleepTime(1);
        $this->assertEquals(1, $apiContext->getRetrySleepTime());

        $this->assertEquals('foo', $apiContext->setApiCredentials('foo', 'bar'));
    }
}
