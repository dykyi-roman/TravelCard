<?php

namespace Dykyi\Services\CardService;

use Stash\Pool;
use Dykyi\Services\CardService\Repository\CardRepositoryInterface;
use Dykyi\Services\Events\Dispatcher;
use Dykyi\Services\CardService\Clients\CardClientInterface;
use Stash\Interfaces\DriverInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class CardService
 * @package Dykyi\Service
 */
class CardService
{
    /** @var CardClientInterface */
    private $client;

    /** @var CardRepositoryInterface  */
    private $repository;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /** @var DriverInterface */
    private $cache;

    /**
     * CardService constructor.
     *
     * @param CardRepositoryInterface $repository
     * @param CardClientInterface $client
     * @param DriverInterface $cache
     */
    public function __construct(CardRepositoryInterface $repository, CardClientInterface $client, DriverInterface $cache)
    {
        $this->client = $client;
        $this->repository = $repository;
        $this->cache = new Pool($cache);
        $this->eventDispatcher = Dispatcher::create();
    }

    public function execute()
    {
        $cards = $this->repository->getCards();
        $item = $this->cache->getItem(md5(serialize($cards)));
        if($item->isMiss()) {
            $sortCard = $this->client->cardSort($cards);
            $item->lock();
            $item->set($sortCard);
            $item->expiresAfter(getenv('CACHE_EXPIRE'));
            $this->cache->save($item);
        }
        $this->eventDispatcher->dispatch('done.action', new GenericEvent(
            null,
            ['message' => 'Route is build success'])
        );

        return $item->get() ?? $this->client->cardSort($cards);
    }
}