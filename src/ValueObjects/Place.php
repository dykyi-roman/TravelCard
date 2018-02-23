<?php

namespace Dykyi\ValueObjects;

/**
 * Class Place
 * @package Dykyi\ValueObjects
 */
class Place extends Number
{
    /** @var Baggage */
    private $baggage;

    /**
     * Place constructor.
     * @param $number
     * @param string $letter
     * @param Baggage $baggage
     */
    public function __construct($number, string $letter = '', Baggage $baggage)
    {
        parent::__construct($number, $letter);
        $this->baggage = $baggage;
    }

    /**
     * @return string
     */
    public function getBaggage(): string
    {
        return $this->baggage->getBaggageInfo();
    }

    public function isEmpty()
    {
        return empty($this->getNumberInfo()) && empty($this->getBaggage());
    }
}