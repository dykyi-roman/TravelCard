<?php

namespace Dykyi\Services\CardService\Clients;

use GuzzleHttp\Client as GuzzleClient;
use Dykyi\Services\Response\ResponseDataExtractor;

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

    public function cardSort(string $name)
    {
        $content = null;
        $client  = new GuzzleClient();
        try {
            $response = $client->request('GET', $this->options['url'], [
                'query' => [
                    'q' => $name,
                    'units' => 'metric',
                    'APPID' => $this->options['key']
                ]
            ]);

            if ($response->getStatusCode() === 200)
            {
                $extractor = new ResponseDataExtractor();
                $content = $extractor->extract($response);
            }
        } catch (\Exception $exception) { }

        return $content;
    }
}