<?php

use Codeception\Test\Unit;
use Rawg\Filters\Filter;
use Rawg\Filters\PaginationFilter;

class PaginationFilterTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testFilter()
    {
        $filter = new PaginationFilter();
        $this->assertInstanceOf(Filter::class, $filter);
        $this->assertInstanceOf(PaginationFilter::class, $filter->setPage(1));
        $this->assertInstanceOf(PaginationFilter::class, $filter->setPageSize(10));
        $this->assertEquals([
            'page' => 1,
            'page_size' => 10
        ], $filter->toArray());
    }
}
