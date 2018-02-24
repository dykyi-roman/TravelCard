<?php

namespace Dykyi\CommandBus\Handler;

use Dykyi\CommandBus\Command\VersionCommand;
use Dykyi\CommandBus\Formatter\ConsoleFormatter;
use Dykyi\Helpers\TextBuilder;
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
        $content = TextBuilder::create()->add(sprintf('Version: %s', $command::VERSION_ID));

        (new Response(ConsoleFormatter::create()->format($content)))->send();
    }
}