<?php

use PHPUnit\Framework\TestCase;

/**
 * Class TextCardService
 *
 * @coversDefaultClass CardService
 */
class TextCardService extends TestCase
{
    /** @var \Dykyi\Services\CardService\CardService */
    private $service;

    private function generateCard(): \Dykyi\Agreggates\Card
    {
        $route = $this->createMock(\Dykyi\ValueObjects\Route::class);
        $transport = $this->createMock(\Dykyi\Agreggates\Transport::class);

        return new \Dykyi\Agreggates\Card($route, $transport);
    }

    public function setUp()
    {
        $repository = $this->createMock(\Dykyi\Services\CardService\Repository\CardRepositoryInterface::class);

        $repository->method('getCards')->willReturn(
            [
                $this->generateCard()
            ]);

        $client = $this->createMock(\Dykyi\Services\CardService\Clients\CardClientInterface::class);
        $client->method('cardSort')->willReturn([$this->generateCard()]);

        $this->service = new \Dykyi\Services\CardService\CardService($repository, $client, new \Stash\Driver\Ephemeral());
    }

    public function testExecute()
    {
        $sortCard = $this->service->execute();
        $this->assertCount(1, $sortCard);
        $this->assertInstanceOf(\Dykyi\Agreggates\Card::class, $sortCard[0]);
    }
}
