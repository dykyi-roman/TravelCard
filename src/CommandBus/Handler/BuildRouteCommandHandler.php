<?php

namespace Dykyi\CommandBus\Handler;

use Dykyi\CommandBus\Command\BuildRouteCommand;
use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;
use Dykyi\Response\ResponseFactory;
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
            $request = new WeatherForecastRequest(
                $command->getResponseFormat(),
                $command->getOutputFile()
            );

//            $client = WeatherClientFactory::create(
//                getenv('API_SERVICE'),
//                [
//                    'url' => getenv('API_URL'),
//                    'key' => getenv('API_KEY')
//                ]
//            );
//
//            $service = new WeatherForecastService($client, new FileSystem());
//            $data = $service->execute($request);

            $responseObject = ResponseFactory::create($request->getResponseFormat());
            $response = new Response($responseObject->response([]));
            $response->send();

        } catch (\InvalidArgumentException $exception) {
            $response = new Response($exception->getMessage());
            $response->send();
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}