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
        $transport = $this->createMock(\Dykyi\Model\Transport::class);
        $this->card = new \Dykyi\Model\Card($route, $transport);
    }

    public function testGetRouteObject()
    {
       $this->assertInstanceOf(\Dykyi\Model\Card::class, $this->card->getRoute());
    }

    public function testGetTransportObject()
    {
        $this->assertInstanceOf(\Dykyi\Model\Transport::class, $this->card->getTransport());
    }

}
