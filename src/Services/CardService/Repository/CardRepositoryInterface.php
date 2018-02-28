<?php

namespace Dykyi\Services\CardService\Repository;

use Dykyi\Services\CardService\CardStorage;

/**
 * Interface CardRepositoryInterface
 * @package Dykyi\Services\CardService\Repository
 */
interface CardRepositoryInterface
{
    /**
     * @return CardStorage
     */
    public function getCards(): CardStorage;
}