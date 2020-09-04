<?php

use Codeception\Test\Unit;
use Rawg\Filters\Filter;
use Rawg\Filters\OrderingFilter;

class OrderingFilterTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testFilter()
    {
        $filter = new OrderingFilter();
        $this->assertInstanceOf(Filter::class, $filter);
        $this->assertInstanceOf(OrderingFilter::class, $filter->setPage(1));
        $this->assertInstanceOf(OrderingFilter::class, $filter->setPageSize(10));
        $this->assertInstanceOf(OrderingFilter::class, $filter->setOrdering('-name'));
        $this->assertEquals([
            'page' => 1,
            'page_size' => 10,
            'ordering' => '-name'
        ], $filter->toArray());
    }
}
