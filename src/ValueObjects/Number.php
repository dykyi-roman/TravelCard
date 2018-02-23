<?php

namespace Dykyi\ValueObjects;

use Dykyi\Printer;

/**
 * Class Number
 * @package Dykyi\ValueObjects
 */
class Number extends Printer
{
    /** @var string */
    protected $info;

    public function __construct($number = '', $letter = '')
    {
        $this->info = (string)$number . $letter;
    }

    /**
     * @return string
     */
    public function getNumberInfo(): string
    {
        return $this->info;
    }
}