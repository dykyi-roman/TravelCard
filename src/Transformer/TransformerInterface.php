<?php

namespace Dykyi\Transformer;

use Dykyi\PrinterInterface;

/**
 * Interface TransformerInterface
 * @package Dykyi\Transformer
 */
interface TransformerInterface
{
    /**'
     * @param PrinterInterface $transport
     * @return mixed
     */
    public function transformer(PrinterInterface $transport);
}