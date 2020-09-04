<?php

namespace Rawg\Filters;

class OrderingFilter extends Filter
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
     * @var string | null
     */
    protected $ordering = null;

    /**
     * @param string $ordering
     * @return OrderingFilter
     */
    public function setOrdering(string $ordering): OrderingFilter
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * @param int $page
     * @return OrderingFilter
     */
    public function setPage(int $page): OrderingFilter
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return OrderingFilter
     */
    public function setPageSize(int $pageSize): OrderingFilter
    {
        $this->page_size = $pageSize;
        return $this;
    }
}