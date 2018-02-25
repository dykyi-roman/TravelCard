<?php

namespace Dykyi\Services\CardService\Clients;

use Dykyi\Agreggates\Card;
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
     * @param array $data
     * @return array
     *
     * @throws \Stash\Exception\RuntimeException
     */
    public function cardSort(array $data): array
    {
        $result = [];
        $client = new GuzzleClient();
        try {
            $response = $client->request('POST', $this->options['url'], [
                'query' => [
                    'data' => $this->prepareToRequest($data)
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                $extractor = new ResponseDataExtractor();
                $content = $extractor->extract($response);
                $result = $this->parsingResponce($data, $content);
            }
        } catch (\Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }

        return $result;
    }

    /**
     * @param array $data
     * @return string
     */
    private function prepareToRequest(array $data): string
    {
        $temp = [];
        /** @var Card $card */
        foreach ($data as $index => $card) {
            $temp[] = [
                $card->getRoute()->getFrom()->getName(),
                $card->getRoute()->getTo()->getName(),
                $index
            ];
        }

        return json_encode($temp);
    }

    /**
     * @param array $data
     * @param array $position
     * @return array
     */
    private function parsingResponce(array $data, array $position)
    {
        $newArray = [];
        foreach ($position as $i) {
            $newArray[] = $data[$i];
        }

        return $newArray;
    }
}