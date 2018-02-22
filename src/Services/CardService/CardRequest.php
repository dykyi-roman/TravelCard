<?php

namespace Dykyi\Services\CardService;

/**
 * Class CardService
 * @package Dykyi\Services\CardService
 */
class CardRequest
{
    private $responseFormat;
    private $outputFile;

    public function __construct(string $responseFormat, $outputFile)
    {
        $this->responseFormat = $responseFormat;
        $this->outputFile     = $outputFile;
    }

    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    public function getOutputFile()
    {
        return $this->outputFile;
    }

    public function getOutputFileExt()
    {
        $format = explode('.', $this->getOutputFile());
        if (count($format) !== 2) {
            throw new \InvalidArgumentException();
        }

        return $format[1];
    }

}