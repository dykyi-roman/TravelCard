<?php

use PHPUnit\Framework\TestCase;

/**
 * Class PlaceTest
 *
 * @coversDefaultClass Place
 */
class PlaceTest extends TestCase
{
    public function serviceProvider(): array
    {
        return [
            ['57', 'A', '', ' Sit in seat 57A'],
            ['22', '', '', ' Sit in seat 22'],
            ['200', 'XRT', 'test baggage', ' Sit in seat 200XRT. test baggage']
        ];
    }

    /**
     *
     * @dataProvider serviceProvider
     *
     * @param string $number
     * @param string $letter
     * @param string $baggage
     */
    public function testPlaceToStringConvertor(string $number, string $letter, $baggage, $expected)
    {
        $place = new \Dykyi\ValueObjects\Place($number, $letter, new \Dykyi\ValueObjects\Baggage($baggage));

        $content = $place->toString(new \Dykyi\Transformer\Transformer());
        $this->assertSame($content, $expected);
    }

    public function testEmptyPlace()
    {
        $place = new \Dykyi\ValueObjects\Place('','',new \Dykyi\ValueObjects\Baggage(''));
        $this->assertTrue($place->isEmpty());
    }

    public function testNumberInfo()
    {
        $place = new \Dykyi\ValueObjects\Place('78','A',new \Dykyi\ValueObjects\Baggage(''));
        $this->assertSame($place->getNumberInfo(), '78A');
    }
}