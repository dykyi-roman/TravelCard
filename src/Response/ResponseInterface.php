<?php

namespace Dykyi\Response;

use Dykyi\Services\CardService\CardStorage;
use Dykyi\Transformer\TransformerInterface;

/**
 * Interface ResponseInterface
 * @package Dykyi\Reponse
 */
interface ResponseInterface
{
    const WEB      = 'web';
    const CONSOLE  = 'cli';

    /**
     * @param CardStorage $storage
     * @param TransformerInterface $transformer
     * @return string
     */
    public function response(CardStorage $storage, TransformerInterface $transformer): string;
}