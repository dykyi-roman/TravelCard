<?php

namespace Dykyi\Services\CardService\Storage;

use Dykyi\Services\CardService\Exception\StorageNotFound;

/**
 * Class Storage
 * @package Dykyi\Services\WeatherForecastService\Clients
 */
class Storage
{
    /**
     * @param string $fileFormat
     * @return FileStorageInterface
     */
    public static function create(string $fileFormat): FileStorageInterface
    {
        $class = __NAMESPACE__ . '\\' . strtoupper($fileFormat).'FileStorage';

        if (!class_exists($class)) {
            throw StorageNotFound::forMessage($fileFormat);
        }

        return new $class();
    }
}