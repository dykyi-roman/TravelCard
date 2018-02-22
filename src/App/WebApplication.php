<?php

namespace Dykyi\App;

use Dykyi\CommandBus\Command\BuildRouteCommand;
use Dykyi\CommandBus\CommandBus;
use Dykyi\Response\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WebApplication
 * @package Dykyi
 */
final class WebApplication implements ApplicationInterface
{
    public function run()
    {
        $request = Request::createFromGlobals();
        $cityName = $request->get('city-name');
        if ($cityName) {
            $commandBus = CommandBus::create();
            $commandBus->handle(new BuildRouteCommand($cityName, null, ResponseInterface::WEB));
        }
    }
}
