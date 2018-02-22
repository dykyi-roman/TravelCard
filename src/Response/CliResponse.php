<?php

namespace Dykyi\Response;

use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;

/**
 * Class CliResponse
 * @package Dykyi\Response
 */
class CliResponse implements ResponseInterface
{
    public function response(array $data): string
    {
        $text = TextBuilder::create();
        foreach ($data as $item)
        {
            $text->add($item);
        }
        return ConsoleFormatter::create()->format($text);
    }
}