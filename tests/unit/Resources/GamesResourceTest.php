<?php

namespace Rawg\Tests\Resources;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Rawg\ApiClient;
use Rawg\Config;
use Rawg\Filters\GamesFilter;
use Rawg\Filters\OrderingFilter;
use Rawg\Filters\PaginationFilter;
use Lukasoppermann\Httpstatus\Httpstatuscodes as Status;
use GuzzleHttp\Psr7\Response;

class GamesResourceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGetGames()
    {
        $responseBody = file_get_contents('tests/_data/games.games.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getGames(new GamesFilter());
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetAdditions()
    {
        $responseBody = file_get_contents('tests/_data/games.additions.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getAdditions(1, (new PaginationFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetDevelopmentTeam()
    {
        $responseBody = file_get_contents('tests/_data/games.development-team.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getDevelopmentTeam(1, (new OrderingFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetGameSeries()
    {
        $responseBody = file_get_contents('tests/_data/games.series.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getGameSeries(1, (new PaginationFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetParentGames()
    {
        $responseBody = file_get_contents('tests/_data/games.parent-games.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getParentGames(1, (new PaginationFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetScreenshots()
    {
        $responseBody = file_get_contents('tests/_data/games.screenshots.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getScreenshots(1, (new OrderingFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetStores()
    {
        $responseBody = file_get_contents('tests/_data/games.stores.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getStores(1, (new OrderingFilter()));
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetGame()
    {
        $responseBody = file_get_contents('tests/_data/games.game.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getGame(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetArchievements()
    {
        $responseBody = file_get_contents('tests/_data/games.archievements.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getArchievements(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetMovies()
    {
        $responseBody = file_get_contents('tests/_data/games.movies.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getMovies(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetReddit()
    {
        $responseBody = file_get_contents('tests/_data/games.reddit.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getRedditPosts(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetSuggested()
    {
        $responseBody = file_get_contents('tests/_data/games.suggested.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getSuggested(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetTwitch()
    {
        $responseBody = file_get_contents('tests/_data/games.twitch.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getTwitchVideos(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

    public function testGetYoutube()
    {
        $responseBody = file_get_contents('tests/_data/games.youtube.json');
        $mock = new MockHandler([
            new Response(Status::HTTP_OK, [], $responseBody)
        ]);
        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $cfg = new Config('MyApp', 'en');
        $client = new ApiClient($cfg, $client);

        $response = $client->games()->getYoutubeVideos(1);
        $this->assertEquals(json_decode($responseBody, true), $response->getData());
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
    }

}
