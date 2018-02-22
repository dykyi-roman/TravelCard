<?php

namespace Dykyi\Services\CardService\Repository;

/**
 * Interface CardRepositoryInterface
 * @package Dykyi\Services\CardService\Repository
 */
interface CardRepositoryInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function getCards(array $data): array;
}