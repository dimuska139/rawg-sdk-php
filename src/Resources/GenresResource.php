<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\OrderingFilter;
use Rawg\Response;

/**
 * Class GenresResource
 * @package Rawg\Resources
 */
class GenresResource extends Resource
{
    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getGenres(OrderingFilter $filter): Response
    {
        return $this->get("/genres", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getGenre(int $id): Response
    {
        return $this->get("/genres/$id");
    }
}