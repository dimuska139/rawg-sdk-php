<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\PaginationFilter;
use Rawg\Response;

/**
 * Class DevelopersResource
 * @package Rawg\Resources
 */
class DevelopersResource extends Resource
{
    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getDeveloper(int $id): Response
    {
        return $this->get("/developers/$id");
    }

    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getDevelopers(PaginationFilter $filter): Response
    {
        return $this->get("/developers", $filter->toArray());
    }
}