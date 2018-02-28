<?php

namespace Dykyi\Services\CardService\Repository;

use Dykyi\Services\CardService\CardStorage;

/**
 * Class PDOCardRepository
 * @package Dykyi\Services\CardService\Repository
 */
class PDOCardRepository implements CardRepositoryInterface
{
    /**
     * @return CardStorage
     */
    public function getCards(): CardStorage
    {
        return new CardStorage();
    }
}