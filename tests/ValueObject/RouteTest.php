<?php

use PHPUnit\Framework\TestCase;

/**
 * Class RouteTest
 *
 * @coversDefaultClass Route
 */
class RouteTest extends TestCase
{
    public function serviceProvider(): array
    {
        return [
            ['Odessa', 'Kiev'],
            ['Kiev', 'Odessa'],
            ['London', 'Berlin']
        ];
    }

    /**
     *
     * @dataProvider serviceProvider
     *
     * @param string $from
     * @param string $to
     */
    public function testRoute(string $from, string $to)
    {
        $route = new \Dykyi\ValueObjects\Route($from, $to);

        $this->assertInstanceOf(\Dykyi\ValueObjects\City::class, $route->getFrom());
        $this->assertInstanceOf(\Dykyi\ValueObjects\City::class, $route->getTo());

        $this->assertSame($route->getFrom()->getName(), $from);
        $this->assertSame($route->getTo()->getName(), $to);
    }
}