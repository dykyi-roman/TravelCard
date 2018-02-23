<?php

namespace Dykyi\Services\CardService\Repository;

/**
 * Interface CardRepositoryInterface
 * @package Dykyi\Services\CardService\Repository
 */
interface CardRepositoryInterface
{
    /**
     * @return array
     */
    public function getCards(): array;
}