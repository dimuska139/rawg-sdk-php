<?php

use Codeception\Test\Unit;
use Rawg\DateRange;

class DateRangeTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testCreate()
    {
        $dateFrom = new DateTime();
        $dateTo = new DateTime();
        $range = DateRange::create($dateFrom, $dateTo);
        $this->assertInstanceOf(DateRange::class, $range);
        $this->assertEquals($dateFrom, $range->getFrom());
        $this->assertEquals($dateTo, $range->getTo());
    }

    public function testInit()
    {
        $dateFrom = new DateTime();
        $dateTo = new DateTime();
        $range = new DateRange($dateFrom, $dateTo);
        $this->assertEquals($dateFrom, $range->getFrom());
        $this->assertEquals($dateTo, $range->getTo());
    }
}
