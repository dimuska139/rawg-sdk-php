<?php

namespace Rawg\Resources;

use Rawg\ApiException;
use Rawg\Filters\OrderingFilter;
use Rawg\Response;

/**
 * Class StoresResource
 * @package Rawg\Resources
 */
class StoresResource extends Resource
{
    /**
     * @param OrderingFilter $filter
     * @return Response
     * @throws ApiException
     */
    public function getStores(OrderingFilter $filter): Response
    {
        return $this->get("/stores", $filter->toArray());
    }

    /**
     * @param int $id
     * @return Response
     * @throws ApiException
     */
    public function getStore(int $id): Response
    {
        return $this->get("/stores/$id");
    }
}