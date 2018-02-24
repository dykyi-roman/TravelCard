<?php

namespace Dykyi\Services\CardService\Repository;

use Dykyi\Model\Card;
use Dykyi\Model\Transport;
use Dykyi\ValueObjects\Baggage;
use Dykyi\ValueObjects\Number;
use Dykyi\ValueObjects\Place;
use Dykyi\ValueObjects\Route;

/**
 * Class InMemoryCardRepository
 * @package Dykyi\Services\CardService\Repository
 */
class InMemoryCardRepository implements CardRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getCards(): array
    {

        $card1 = new Card(
            new Route('Barcelona','Gerona'),
            new Transport(
                'airport bus',
                new Number(),
                new Place('', '', new Baggage())
            )
        );

        $card2 = new Card(
            new Route('Madrid','Barcelona'),
            new Transport(
                'train',
                new Number('78A'),
                new Place(45, 'B', new Baggage())
            )
        );

        $card3 = new Card(
            new Route('Gerona','Stockholm'),
            new Transport(
                'flight',
                new Number('SK455'),
                new Place(3, 'A', new Baggage('Baggage drop at ticket counter 344')),
                'Gate 45B'
            )
        );

        $card4 = new Card(
            new Route('Stockholm','New York'),
            new Transport(
                'flight',
                new Number('SK22'),
                new Place(7, 'B', new Baggage('Baggage will we automatically transferred from your last leg')),
                'Gate 22'
            )
        );

        return [$card4, $card3, $card2, $card1];
    }
}