<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\OrderingFilter;
use Rawg\Filters\PaginationFilter;
use Rawg\Filters\GamesFilter;
use Rawg\Response;

class GamesResource extends Resource
{
    public function getGames(GamesFilter $filter): Response
    {
        return $this->get("/games", $filter->toArray());
    }

    /**
     * @param int $id
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getAdditions(int $id, PaginationFilter $filter): Response
    {
        return $this->get("/games/$id/additions", $filter->toArray());
    }

    /**
     * @param int $id
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getDevelopmentTeam(int $id, OrderingFilter $filter): Response
    {
        return $this->get("/games/$id/development-team", $filter->toArray());
    }

    /**
     * @param int $id
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getGameSeries(int $id, PaginationFilter $filter): Response
    {
        return $this->get("/games/$id/game-series", $filter->toArray());
    }

    /**
     * @param int $id
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getParentGames(int $id, PaginationFilter $filter): Response
    {
        return $this->get("/games/$id/parent-games", $filter->toArray());
    }

    /**
     * @param int $id
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getScreenshots(int $id, OrderingFilter $filter): Response
    {
        return $this->get("/games/$id/screenshots", $filter->toArray());
    }

    /**
     * @param int $id
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getStores(int $id, OrderingFilter $filter): Response
    {
        return $this->get("/games/$id/stores", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getGame(int $id): Response
    {
        return $this->get("/games/$id");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getArchievements(int $id): Response
    {
        return $this->get("/games/$id/achievements");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getMovies(int $id): Response
    {
        return $this->get("/games/$id/movies");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getRedditPosts(int $id): Response
    {
        return $this->get("/games/$id/reddit");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getSuggested(int $id): Response
    {
        return $this->get("/games/$id/suggested");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getTwitchVideos(int $id): Response
    {
        return $this->get("/games/$id/twitch");
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getYoutubeVideos(int $id): Response
    {
        return $this->get("/games/$id/youtube");
    }
}