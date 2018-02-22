<?php

namespace Dykyi\Services\CardService\Exception;

/**
 * Class StorageNotFound
 * @package Dykyi\Services\CardService\Exception
 */
class StorageNotFound extends \LogicException
{
    /**
     * @param $exceptionMessage
     * @return StorageNotFound
     */
    public static function forMessage(string $exceptionMessage)
    {
        return new self(
            sprintf(
                'Could not found storage for saving file in "%s" format',
                $exceptionMessage
            )
        );
    }
}