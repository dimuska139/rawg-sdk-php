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
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->tags()->getTags((new PaginationFilter())->setPageSize(2));
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertNotNull($response->getData()['count']);
        $this->assertNotCount(0, $response->getData()['results']);
    }

    public function testGetTag()
    {
        $cfg = new Config(getenv(ENV_API_KEY));
        $client = new ApiClient($cfg);

        $response = $client->tags()->getTag(1);
        $this->assertEquals(Status::HTTP_OK, $response->getResponse()->getStatusCode());
        $this->assertEquals("Survival", $response->getData()['name']);
    }
}
