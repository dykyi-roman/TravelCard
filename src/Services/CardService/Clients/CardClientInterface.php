<?php

namespace Dykyi\Services\CardService\Clients;

/**
 * Interface CardClientInterface
 * @package Dykyi\Clients
 */
interface CardClientInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function cardSort(array $data);
}