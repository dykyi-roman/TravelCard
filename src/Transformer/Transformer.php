<?php

namespace Dykyi\Transformer;

use Dykyi\Agreggates\Card;
use Dykyi\Agreggates\Transport;
use Dykyi\PrinterInterface;
use Dykyi\ValueObjects\Place;
use Dykyi\ValueObjects\Route;

/**
 * Class Transformer
 * @package Dykyi\Transformer
 */
class Transformer implements TransformerInterface
{
    const FINISH_LINE = 'You have arrived at your final destination';

    /**
     * @param Transport $transport
     * @return mixed
     */
    public function transformerTransport(Transport $transport): string
    {
        $number = empty($transport->getNumber()) ? '' : ' ' . $transport->getNumber();
        $platform = empty($transport->getPlatform()) ? '' : ', ' . $transport->getPlatform() . '.';

        return $transport->getType() . $number . $platform;
    }

    public function transformerRoute(Route $route): string
    {
        return 'From ' . $route->getFrom()->getName() . ' to ' . $route->getTo()->getName();
    }

    public function transformerPlace(Place $place): string
    {
        if ($place->isEmpty()) {
            return 'No seat assignment';
        }

        return ' Sit in seat ' . $place->getNumberInfo() . $place->getBaggage();
    }

    public function transformerCard(Card $card): string
    {
        return
            'Take ' . $card->getTransport()->toString($this) . ' ' .
            $card->getRoute()->toString($this) . '.' .
            $card->getTransport()->getPlace()->toString($this) . '.';
    }

    public function transformer(PrinterInterface $obj): string
    {
        try {
            $reflect = new \ReflectionClass($obj);
        } catch (\ReflectionException $e) {}
        $methodName = 'transformer' . $reflect->getShortName();

        if (method_exists($this, $methodName)) {
            return $this->$methodName($obj);
        }

        return '';
    }
}