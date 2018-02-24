<?php

namespace Dykyi\ValueObjects;

use Dykyi\Printer;

/**
 * Class Baggage
 * @package Dykyi\ValueObjects
 */
class Baggage extends Printer
{
    /** @var string */
    private $info;

    public function __construct($info = '')
    {
        $this->info = (string)$info;
    }

    /**
     * @param string $info
     * @return Baggage
     */
    public function add(string $info): Baggage
    {
        return new self($info);
    }

    /**
     * @return string
     */
    public function getBaggageInfo(): string
    {
        return empty($this->info) ? '' : '. ' . $this->info;
    }
}