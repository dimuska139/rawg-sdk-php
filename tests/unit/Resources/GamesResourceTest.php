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
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getGames((new GamesFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetAdditions()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getAdditions(123, (new PaginationFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetDevelopmentTeam()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getDevelopmentTeam(23, (new OrderingFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetGameSeries()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getGameSeries(21, (new PaginationFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetParentGames()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getParentGames(34, (new PaginationFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetScreenshots()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getScreenshots(23, (new OrderingFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetStores()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getStores(23, (new OrderingFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetGameById()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getGame(4286);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertEquals("BioShock", $response->getData()['name']);
    }

    public function testGetGameBySlug()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getGame('bioshock');
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertEquals("BioShock", $response->getData()['name']);
    }

    public function testGetArchievements()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getArchievements(23);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetMovies()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getMovies(23);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetReddit()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getRedditPosts(25);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetSuggested()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getSuggested(1);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetTwitch()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getTwitchVideos(10213);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetYoutube()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->games()->getYoutubeVideos(1);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

}
