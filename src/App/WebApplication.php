<?php

namespace Dykyi\App;

use Dykyi\CommandBus\Command\BuildRouteCommand;
use Dykyi\CommandBus\CommandBus;
use Dykyi\Response\ResponseInterface;

/**
 * Class WebApplication
 * @package Dykyi
 */
final class WebApplication implements ApplicationInterface
{
    public function run()
    {
        $commandBus = CommandBus::create();
        $commandBus->handle(new BuildRouteCommand(ResponseInterface::WEB));
    }
}
