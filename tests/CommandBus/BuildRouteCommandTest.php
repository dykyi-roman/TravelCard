<?php

use PHPUnit\Framework\TestCase;

/**
 * Class BuildRouteCommandTest
 *
 * @coversDefaultClass BuildRouteCommand
 */
class BuildRouteCommandTest extends TestCase
{
    public function testBuildRouteResponceFormat()
    {
        $command = new \Dykyi\CommandBus\Command\BuildRouteCommand();
        $this->assertSame($command->getResponseFormat(), \Dykyi\Response\ResponseInterface::CONSOLE);
    }
}
