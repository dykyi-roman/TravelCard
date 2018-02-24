<?php

namespace Dykyi\Services\Events;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class Listener
 * @package Dykyi\Services\Events
 */
class Listener
{
    /** @var LoggerInterface|NullLogger  */
    protected $logger;

    /**
     * @param Event $event
     */
    public function onDoneAction(Event $event)
    {
        $this->logger->info($event['message']);
    }

    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?? new NullLogger();
    }
}