<?php

namespace Dykyi\Services\CardService\Repository;

/**
 * Class PDOCardRepository
 * @package Dykyi\Services\CardService\Repository
 */
class PDOCardRepository implements CardRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getCards(): array
    {
        //TODO: get card from DB
        return [];
    }
}