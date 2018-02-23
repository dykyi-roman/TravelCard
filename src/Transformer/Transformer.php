<?php

namespace Dykyi\Transformer;

use Dykyi\Model\Card;
use Dykyi\Model\Transport;
use Dykyi\PrinterInterface;
use Dykyi\ValueObjects\Place;
use Dykyi\ValueObjects\Route;

/**
 * Class Transformer
 * @package Dykyi\Transformer
 */
class Transformer implements TransformerInterface
{
    /**
     * @param Transport $transport
     * @return mixed
     */
    public function transformerTransport(Transport $transport): string
    {
        $number   = empty($transport->getNumber()) ? '' : ' '. $transport->getNumber();
        $platform = empty($transport->getPlatform()) ? '' : ', '. $transport->getPlatform().'.';

        return $transport->getType() . $number . $platform;
    }

    public function transformerRoute(Route $route): string
    {
        return 'From ' . $route->getFrom()->getName() . ' to ' . $route->getTo()->getName();
    }

    public function transformerPlace(Place $place): string
    {
        if ($place->isEmpty()){
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

    /**'
     * @param PrinterInterface $obj
     * @return string
     */
    public function transformer(PrinterInterface $obj): string
    {
        if ($obj instanceof Card) {
            return $this->transformerCard($obj);
        }
        if ($obj instanceof Route) {
            return $this->transformerRoute($obj);
        }

        if ($obj instanceof Transport) {
            return $this->transformerTransport($obj);
        }

        if ($obj instanceof Place) {
           return $this->transformerPlace($obj);
        }
    }
}