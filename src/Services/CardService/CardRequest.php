<?php

namespace Dykyi\Services\CardService;

/**
 * Class CardRequest
 *
 * @package Dykyi\Services\CardService
 */
class CardRequest
{
    private $responseFormat;

    public function __construct(string $responseFormat)
    {
        $this->responseFormat = $responseFormat;
    }

    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }
}