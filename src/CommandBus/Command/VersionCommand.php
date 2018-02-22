<?php

namespace Dykyi\CommandBus\Command;

use SimpleBus\Command\Command;

/**
 * Class VersionCommand
 * @package Dykyi\Command
 */
class VersionCommand implements Command
{
    const VERSION_ID = '1.2';
    /**
     * @return string
     */
    public function name()
    {
        return __CLASS__;
    }
}