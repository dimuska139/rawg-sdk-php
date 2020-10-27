<?php

namespace Rawg\Tests\Resources;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Rawg\ApiException;
use Rawg\Config;
use Rawg\Filters\OrderingFilter;
use Lukasoppermann\Httpstatus\Httpstatuscodes as Status;
use GuzzleHttp\Psr7\Response;

class ResourceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testLanguage()
    {
        $language = 'ru';
        $apiKey = 'FakeApp';
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], '')
        ]);
        $handler = HandlerStack::create($mock);

        $history = [];
        $historyMiddleware = Middleware::history($history);
        $handler->push($historyMiddleware);

        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config($apiKey, $language);
        $dummyResource = new DummyResource($cfg, $client);
        $dummyResource->getFakeData(new OrderingFilter());

        /**
         * @var Request $historyRequest
         */
        $historyRequest = $history[0]['request'];
        $this->assertEquals("page=1&page_size=20&key=$apiKey&lang=$language", $historyRequest->getUri()->getQuery());
    }

    public function testException()
    {
        $apiKey = 'key';
        $mock = new MockHandler([
            new Response(Status::HTTP_FORBIDDEN, [], '')
        ]);
        $handler = HandlerStack::create($mock);

        $history = [];
        $historyMiddleware = Middleware::history($history);
        $handler->push($historyMiddleware);

        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config($apiKey, 'en');
        $dummyResource = new DummyResource($cfg, $client);

        $this->tester->expectThrowable(ApiException::class, function() use ($dummyResource) {
            $dummyResource->getFakeData(new OrderingFilter());
        });
    }

    public function testQueryParams()
    {
        $apiKey = 'key';
        $lang = 'en';
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], ''),
            new Response(Status::HTTP_OK, [], '')
        ]);
        $handler = HandlerStack::create($mock);

        $history = [];
        $historyMiddleware = Middleware::history($history);
        $handler->push($historyMiddleware);

        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config($apiKey, $lang);
        $dummyResource = new DummyResource($cfg, $client);
        $dummyResource->getFakeData(new OrderingFilter());
        $dummyResource->getFakeData((new OrderingFilter())->setOrdering('name'));

        $this->assertEquals("page=1&page_size=20&key=$apiKey&lang=$lang", $history[0]['request']->getUri()->getQuery());
        $this->assertEquals("page=1&page_size=20&ordering=name&key=$apiKey&lang=$lang", $history[1]['request']->getUri()->getQuery());
    }
}
