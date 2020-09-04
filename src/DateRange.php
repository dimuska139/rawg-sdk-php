<?php

namespace Rawg;

use DateTime;

class DateRange
{
    /**
     * @var DateTime
     */
    protected $from;

    /**
     * @var DateTime
     */
    protected $to;

    /**
     * DateRange constructor.
     * @param DateTime $from
     * @param DateTime $to
     */
    public function __construct(DateTime $from, DateTime $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return DateTime
     */
    public function getFrom(): DateTime
    {
        return $this->from;
    }

    /**
     * @return DateTime
     */
    public function getTo(): DateTime
    {
        return $this->to;
    }

    /**
     * @param DateTime $from
     * @param DateTime $to
     * @return DateRange
     */
    static function create(DateTime $from, DateTime $to): DateRange
    {
        return new self($from, $to);
    }
}