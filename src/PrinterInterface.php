<?php

namespace Dykyi;

use Dykyi\Transformer\TransformerInterface;

/**
 * Interface IPrinter
 * @package Dyky
 */
interface PrinterInterface
{
    /**
     * @param TransformerInterface $transformer
     * @return mixed
     */
    public function toString(TransformerInterface $transformer);
}