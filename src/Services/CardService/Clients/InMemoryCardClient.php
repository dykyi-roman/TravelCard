<?php

namespace Dykyi\Services\CardService\Clients;

use Dykyi\Agreggates\Card;
use Dykyi\Services\CardService\CardStorage;
use GuzzleHttp\Client as GuzzleClient;
use Dykyi\Services\Response\ResponseDataExtractor;
use Stash\Exception\RuntimeException;

/**
 * Class InMemoryCardClient
 * @package Dykyi\Services\CardService\Clients
 */
class InMemoryCardClient implements CardClientInterface
{
    private $options;

    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param CardStorage $storage
     * @return CardStorage
     *
     * @throws \Stash\Exception\RuntimeException
     */
    public function cardSort(CardStorage $storage): CardStorage
    {
        $result = [];
        $client = new GuzzleClient();
        try {
            $response = $client->request('POST', $this->options['url'], [
                'query' => [
                    'data' => $this->prepareToRequest($storage)
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                $extractor = new ResponseDataExtractor();
                $content = $extractor->extract($response);
                $result = $this->parsingResponce($storage, $content);
            }
        } catch (\Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }

        return $result;
    }

    /**
     * @param CardStorage $storage
     * @return string
     */
    private function prepareToRequest(CardStorage $storage): string
    {
        $temp = [];
        /** @var Card $card */
        foreach ($storage as $index => $card) {
            $temp[] = [
                $card->getRoute()->getFrom()->getName(),
                $card->getRoute()->getTo()->getName(),
                $index
            ];
        }

        return json_encode($temp);
    }

    /**
     * @param CardStorage $storage
     * @param array $position
     * @return CardStorage
     */
    private function parsingResponce(CardStorage $storage, array $position)
    {
        $newCardStorage = new CardStorage();
        foreach ($position as $index => $i) {
            $newCardStorage->set($index, $storage->get($i));
        }
        return $newCardStorage;
    }
}