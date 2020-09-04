<?php

namespace Rawg\Tests\Resources;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Rawg\ApiClient;
use Rawg\Config;
use Rawg\Filters\OrderingFilter;
use Lukasoppermann\Httpstatus\Httpstatuscodes as Status;
use GuzzleHttp\Psr7\Response;

class StoresResourceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGetStores()
    {
        $responseBody = file_get_contents('tests/_data/stores.stores.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);
        $response = $client->stores()->getStores(new OrderingFilter());
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetStore()
    {
        $responseBody = file_get_contents('tests/_data/stores.store.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);

        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->stores()->getStore(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }
}
