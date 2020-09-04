<?php

namespace Rawg;

use GuzzleHttp\Client as HttpClient;
use Rawg\Resources\CreatorsResource;
use Rawg\Resources\DevelopersResource;
use Rawg\Resources\GamesResource;
use Rawg\Resources\GenresResource;
use Rawg\Resources\PlatformsResource;
use Rawg\Resources\PublishersResource;
use Rawg\Resources\StoresResource;
use Rawg\Resources\TagsResource;

class ApiClient
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var Config
     */
    protected $config;

    /**
     * ApiClient constructor.
     * @param Config $cfg
     * @param HttpClient|null $httpClient
     */
    public function __construct(Config $cfg, HttpClient $httpClient = null)
    {
        $this->config = $cfg;
        $this->httpClient = $httpClient ?? new HttpClient();
    }

    /**
     * @return CreatorsResource
     */
    public function creators(): CreatorsResource
    {
        return new CreatorsResource($this->config, $this->httpClient);
    }

    /**
     * @return DevelopersResource
     */
    public function developers(): DevelopersResource
    {
        return new DevelopersResource($this->config, $this->httpClient);
    }

    /**
     * @return GamesResource
     */
    public function games(): GamesResource
    {
        return new GamesResource($this->config, $this->httpClient);
    }

    /**
     * @return GenresResource
     */
    public function genres(): GenresResource
    {
        return new GenresResource($this->config, $this->httpClient);
    }

    /**
     * @return PlatformsResource
     */
    public function platforms(): PlatformsResource
    {
        return new PlatformsResource($this->config, $this->httpClient);
    }

    /**
     * @return PublishersResource
     */
    public function publishers(): PublishersResource
    {
        return new PublishersResource($this->config, $this->httpClient);
    }

    /**
     * @return StoresResource
     */
    public function stores(): StoresResource
    {
        return new StoresResource($this->config, $this->httpClient);
    }

    /**
     * @return TagsResource
     */
    public function tags(): TagsResource
    {
        return new TagsResource($this->config, $this->httpClient);
    }
}