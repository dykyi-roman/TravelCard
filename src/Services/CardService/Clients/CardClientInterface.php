<?php

namespace Dykyi\Services\CardService\Clients;

/**
 * Interface CardClientInterface
 * @package Dykyi\Clients
 */
interface CardClientInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function cardSort(string $name);
}