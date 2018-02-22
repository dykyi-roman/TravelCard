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
    private $outputFile;

    /**
     * WeatherForecast constructor.
     *
     * @param null $responseFormat
     * @param null $outputFile
     *
     * @throws \DomainException
     */
    public function __construct($outputFile = null, $responseFormat = null)
    {
        $this->outputFile     = $outputFile;
        $this->responseFormat = $responseFormat ?? ResponseInterface::CONSOLE;
    }

    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    public function getOutputFile()
    {
        return $this->outputFile;
    }

    public function name()
    {
        return __CLASS__;
    }
}