<?php

namespace Dykyi\Services\CardService\Clients;

use Dykyi\Services\CardService\CardStorage;

/**
 * Interface CardClientInterface
 * @package Dykyi\Clients
 */
interface CardClientInterface
{
    /**
     * @param CardStorage $data
     * @return mixed
     */
    public function cardSort(CardStorage $data): CardStorage;
}