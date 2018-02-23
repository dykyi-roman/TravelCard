<?php

namespace Dykyi\Model;

use Dykyi\Printer;
use Dykyi\ValueObjects\Number;
use Dykyi\ValueObjects\Place;

/**
 * Class Transport
 * @package Dykyi\Model
 */
class Transport extends Printer
{
    /**
     * @var string
     */
    private $type;

    /** @var Number */
    private $number;

    /** @var Place */
    private $place;


    /** @var Place */
    private $platform;


    /**
     * Transport constructor.
     *
     * @param string $type
     * @param Number $number
     * @param Place $place
     * @param string $platform
     */
    public function __construct(string $type, Number $number, Place $place, string $platform = '')
    {
        $this->type     = $type;
        $this->number   = $number;
        $this->platform = $platform;
        $this->place    = $place;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Place
     */
    public function getPlace(): Place
    {
        return $this->place;
    }

    public function getNumber(): string
    {
        return $this->number->getNumberInfo();
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }
}