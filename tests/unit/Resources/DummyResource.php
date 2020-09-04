<?php

namespace Rawg\Tests\Resources;

use Rawg\ApiException;
use Rawg\Filters\OrderingFilter;
use Rawg\Filters\PaginationFilter;
use Rawg\Resources\Resource;
use Rawg\Response;

/**
 * Class DummyResource
 * @package Rawg\Resources
 */
class DummyResource extends Resource
{
    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getFakeData(OrderingFilter $filter): Response
    {
        return $this->get("/fake", $filter->toArray());
    }
}