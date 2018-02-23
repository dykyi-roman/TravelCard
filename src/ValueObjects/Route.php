<?php

namespace Dykyi\ValueObjects;

use Dykyi\Printer;

/**
 * Class Route
 * @package Dykyi\ValueObjects
 */
class Route extends Printer
{
    /** @var City */
    private $from;

    /** @var City */
    private $to;

    /**
     * Route constructor.
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = new City($from);
        $this->to = new City($to);
    }

    /**
     * @return City
     */
    public function getFrom(): City
    {
        return $this->from;
    }

    /**
     * @return City
     */
    public function getTo(): City
    {
        return $this->to;
    }
}