<?php

namespace Rawg\Filters;

class PaginationFilter extends Filter
{
    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var int
     */
    protected $page_size = 20;

    /**
     * @param int $page
     * @return PaginationFilter
     */
    public function setPage(int $page): PaginationFilter
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return PaginationFilter
     */
    public function setPageSize(int $pageSize): PaginationFilter
    {
        $this->page_size = $pageSize;
        return $this;
    }
}