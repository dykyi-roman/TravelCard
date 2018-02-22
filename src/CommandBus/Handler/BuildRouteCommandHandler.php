<?php

namespace Dykyi\CommandBus\Handler;

use Dykyi\CommandBus\Command\BuildRouteCommand;
use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;
use Dykyi\Response\ResponseFactory;
use Dykyi\Services\CardService\CardRequest;
use Dykyi\Services\CardService\CardService;
use Dykyi\Services\CardService\Clients\InMemoryCardClient;
use Dykyi\Services\CardService\Repository\InMemoryCardRepository;
use Dykyi\Services\WeatherForecastService\WeatherForecastRequest;
use Stash\Driver\FileSystem;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WeatherForecastCommandHandler
 * @package Dykyi\Command\Handler
 */
class BuildRouteCommandHandler
{
    /**
     * @param BuildRouteCommand $command
     * @throws \Throwable
     */
    public function handle(BuildRouteCommand $command)
    {
        try {
            $request = new CardRequest(
                $command->getResponseFormat(),
                $command->getOutputFile()
            );

            $service = new CardService(
                new InMemoryCardRepository(),
                new InMemoryCardClient(['url' => getenv('API_CLIENT_URL')]),
                new FileSystem()
            );

            $route = $service->execute($request);
            $sortRoute = $service->sort($route);

            $responseObject = ResponseFactory::create($request->getResponseFormat());
            $response = new Response($responseObject->response($sortRoute));
            $response->send();

        } catch (\InvalidArgumentException $exception) {
            $response = new Response($exception->getMessage());
            $response->send();
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}