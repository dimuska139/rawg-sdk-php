<?php

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Rawg\ApiClient;
use Rawg\ApiException;
use Rawg\Config;
use Rawg\Resources\CreatorsResource;
use Rawg\Resources\DevelopersResource;
use Rawg\Resources\GamesResource;
use Rawg\Resources\GenresResource;
use Rawg\Resources\PlatformsResource;
use Rawg\Resources\PublishersResource;
use Rawg\Resources\StoresResource;
use Rawg\Resources\TagsResource;

class ApiClientTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Client
     */
    protected $fakeClient;

    protected function _before()
    {
        $mock = new MockHandler([]);
        $handler = HandlerStack::create($mock);
        $this->fakeClient = new Client([
            'handler' => $handler
        ]);
    }

    public function testInit()
    {
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $this->fakeClient);

        $this->assertInstanceOf(CreatorsResource::class, $client->creators());
        $this->assertInstanceOf(DevelopersResource::class, $client->developers());
        $this->assertInstanceOf(GamesResource::class, $client->games());
        $this->assertInstanceOf(GenresResource::class, $client->genres());
        $this->assertInstanceOf(PlatformsResource::class, $client->platforms());
        $this->assertInstanceOf(PublishersResource::class, $client->publishers());
        $this->assertInstanceOf(StoresResource::class, $client->stores());
        $this->assertInstanceOf(TagsResource::class, $client->tags());
    }
}
