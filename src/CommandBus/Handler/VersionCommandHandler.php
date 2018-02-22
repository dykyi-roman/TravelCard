<?php

namespace Dykyi\CommandBus\Handler;

use Dykyi\CommandBus\Command\VersionCommand;
use Dykyi\Response\CliResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class VersionCommandHandler
 * @package Dykyi\Command\Handler
 */
class VersionCommandHandler
{
    /**
     * @param VersionCommand $command
     */
    public function handle(VersionCommand $command)
    {
        $cliResponse = new CliResponse();
        $responseText = $cliResponse->response([sprintf('Version: %s', $command::VERSION_ID)]);

        (new Response($responseText))->send();
    }
}