<?php

namespace Dykyi\CommandBus\Command;

use SimpleBus\Command\Command;

/**
 * Class WelcomePageCommand
 * @package Dykyi\Command
 */
class WelcomePageCommand implements Command
{
    /**
     * @return string
     */
    public function name()
    {
        return __CLASS__;
    }
}