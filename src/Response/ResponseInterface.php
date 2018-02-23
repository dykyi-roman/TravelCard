<?php

namespace Dykyi\Response;

use Dykyi\Transformer\TransformerInterface;

/**
 * Interface ResponseInterface
 * @package Dykyi\Reponse
 */
interface ResponseInterface
{
    const WEB      = 'web';
    const CONSOLE  = 'cli';

    public function response(array $data, TransformerInterface $transformer): string;
}