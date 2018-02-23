<?php

namespace Dykyi;

use Dykyi\Transformer\TransformerInterface;

/**
 * Class Printer
 * @package Dykyi
 */
abstract class Printer implements PrinterInterface
{
    /**
     * @param TransformerInterface $transformer
     * @return mixed
     */
    public function toString(TransformerInterface $transformer)
    {
        return $transformer->transformer($this);
    }
}