<?php

namespace Rawg\Tests\Resources;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Rawg\ApiClient;
use Rawg\Config;
use Rawg\Filters\PaginationFilter;
use Lukasoppermann\Httpstatus\Httpstatuscodes as Status;
use GuzzleHttp\Psr7\Response;

class CreatorsResourceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGetCreators()
    {
        $responseBody = file_get_contents('tests/_data/creators.creators.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->creators()->getCreators(new PaginationFilter());
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetCreator()
    {
        $responseBody = file_get_contents('tests/_data/creators.creator.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->creators()->getCreator(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetRoles()
    {
        $responseBody = file_get_contents('tests/_data/creator-roles.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->creators()->getRoles(new PaginationFilter());
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }
}
