<?php

namespace Dykyi\Response;

use Dykyi\CommandBus\Formatter\HtmlFormatter;
use Dykyi\Helpers\TextBuilder;
use Dykyi\Model\Card;
use Dykyi\Transformer\Transformer;
use Dykyi\Transformer\TransformerInterface;

/**
 * Class HTMLResponse
 * @package Dykyi\Response
 */
class WebResponse implements ResponseInterface
{
    /**
     * @param array $data
     * @param TransformerInterface $transformer
     * @return string
     */
    public function response(array $data, TransformerInterface $transformer): string
    {
        $text = TextBuilder::create();
        /** @var Card $card */
        foreach ($data as $card) {
            $text->add($card->toString($transformer));
        }
        $text->add(Transformer::FINISH_LINE);

        return Htmlformatter::create()->format($text);
    }
}