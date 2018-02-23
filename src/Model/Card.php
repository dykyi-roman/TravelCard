<?php

namespace Dykyi\Model;

use Dykyi\Printer;
use Dykyi\ValueObjects\Route;

/**
 * Class Card
 * @package Dykyi\Model
 */
class Card extends Printer
{
    /**
     * @var Route
     */
    private $route;

    /** @var Transport */
    private $transport;

    public function __construct(Route $route, Transport $transport)
    {
        $this->route     = $route;
        $this->transport = $transport;
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @return Transport
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

}