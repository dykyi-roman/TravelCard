<?php

namespace Dykyi\CommandBus\Command;

use Dykyi\Response\ResponseInterface;
use SimpleBus\Command\Command;

/**
 * Class BuildRouteCommand
 * @package Dykyi\Command
 */
class BuildRouteCommand implements Command
{
    private $responseFormat;

    public function __construct($responseFormat = null)
    {
        $this->responseFormat = $responseFormat ?? ResponseInterface::CONSOLE;
    }

    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    public function name()
    {
        return __CLASS__;
    }
}