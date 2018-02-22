<?php

namespace Dykyi\Response;

use Dykyi\CommandBus\Formatter\HtmlFormatter;
use Dykyi\Helpers\TextBuilder;

/**
 * Class HTMLResponse
 * @package Dykyi\Response
 */
class WebResponse implements ResponseInterface
{
    public function response(array $data): string
    {
        $text = TextBuilder::create();
        foreach ($data as $item)
        {
            $text->add($item);
        }
        return Htmlformatter::create()->format($text);
    }
}