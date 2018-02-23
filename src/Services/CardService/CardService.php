<?php

namespace Dykyi\Services\CardService;

use Dykyi\Services\CardService\Repository\CardRepositoryInterface;
use Dykyi\Services\Events\Dispatcher;
use Dykyi\Services\Events\Event\SaveFileInTheStorageEvent;
use Dykyi\Services\CardService\Clients\CardClientInterface;
use Dykyi\Services\CardService\Storage\Storage;
use Stash\Interfaces\DriverInterface;
use Stash\Pool;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class WeatherForecastService
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

    /**
     * @param CardRequest $request
     * @return mixed
     */
    public function execute(CardRequest $request)
    {
        //        $item = $this->cache->getItem($request->getC()->getName());
//        if($item->isMiss()){
//            $data = $this->client->get($request->getC()->getName());
//            $item->lock();
//            $item->set($data);
//            $item->expiresAfter(getenv('CACHE_EXPIRE'));
//            $this->cache->save($item);
//        }
//
//        $result = $this->convert($item->get() ?? $data);

        $cards    = $this->repository->getCards();
        $sortCard = $this->client->cardSort($cards);
        $this->createSaveToFileEvent($request, $sortCard);

        return $sortCard;
    }

    /**
     * @param CardRequest $request
     * @param $data
     */
    private function createSaveToFileEvent(CardRequest $request, $data)
    {
        if (null !== $request->getOutputFile()) {
            $storage = Storage::create($request->getOutputFileExt());
            $event = new SaveFileInTheStorageEvent($storage, $request->getOutputFile(), $data);
            $this->eventDispatcher->dispatch('save.file.action', $event);
        }
    }
}