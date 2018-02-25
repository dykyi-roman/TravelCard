<?php

use PHPUnit\Framework\TestCase;

/**
 * Class TextBuilderTest
 *
 * @coversDefaultClass Card
 */
class TextCard extends TestCase
{
    private $card;

    public function setUp()
    {
        $route = $this->createMock(\Dykyi\ValueObjects\Route::class);
        $transport = $this->createMock(\Dykyi\Agreggates\Transport::class);
        $this->card = new \Dykyi\Agreggates\Card($route, $transport);
    }

    public function testGetRouteObject()
    {
       $this->assertInstanceOf(\Dykyi\Agreggates\Card::class, $this->card->getRoute());
    }

    public function testGetTransportObject()
    {
        $this->assertInstanceOf(\Dykyi\Agreggates\Transport::class, $this->card->getTransport());
    }

}
