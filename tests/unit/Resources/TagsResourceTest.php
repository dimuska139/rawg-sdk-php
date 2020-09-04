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

class TagsResourceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGetTags()
    {
        $responseBody = file_get_contents('tests/_data/tags.tags.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);

        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $tagsResponse = $client->tags()->getTags((new PaginationFilter()));
        $this->assertEquals(json_decode($responseBody, true), $tagsResponse->getData());
        $this->assertEquals(Status::HTTP_OK, $tagsResponse->getResponse()->getStatusCode());
    }

    public function testGetTag()
    {
        $responseBody = file_get_contents('tests/_data/tags.tag.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);

        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $tagsResponse = $client->tags()->getTag(1);
        $this->assertEquals(json_decode($responseBody, true), $tagsResponse->getData());
        $this->assertEquals(Status::HTTP_OK, $tagsResponse->getResponse()->getStatusCode());
    }
}
