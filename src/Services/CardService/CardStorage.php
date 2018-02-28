<?php

namespace Dykyi\Services\CardService;

use Dykyi\Agreggates\Card;
use Traversable;

/**
 * Class CardStorage
 * @package Dykyi\Service
 */
class CardStorage implements \IteratorAggregate
{
    protected $storage = [];

    public function set($key, Card $card)
    {
        $this->storage[$key] = $card;
    }

    public function get(int $key): Card
    {
        return $this->storage[$key];
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->storage);
    }
}