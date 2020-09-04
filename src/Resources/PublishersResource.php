<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\PaginationFilter;
use Rawg\Response;

/**
 * Class PublishersResource
 * @package Rawg\Resources
 */
class PublishersResource extends Resource
{
    /**
     * @param PaginationFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getPublishers(PaginationFilter $filter): Response
    {
        return $this->get("/publishers", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getPublisher(int $id): Response
    {
        return $this->get("/publishers/$id");
    }
}