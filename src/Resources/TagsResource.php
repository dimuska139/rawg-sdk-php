<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\PaginationFilter;
use Rawg\Response;

/**
 * Class TagsResource
 * @package Rawg\Resources
 */
class TagsResource extends Resource
{
    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getTags(PaginationFilter $filter): Response
    {
        return $this->get("/tags", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getTag(int $id): Response
    {
        return $this->get("/tags/$id");
    }
}