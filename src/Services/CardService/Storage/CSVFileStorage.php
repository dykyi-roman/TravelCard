<?php

namespace Dykyi\Services\CardService\Storage;

/**
 * Class CSVFileRepository
 * @package Dykyi\Services\CardService\Clients
 */
class CSVFileStorage implements FileStorageInterface
{
    /**
     * @param string $fileName
     * @param array $data
     *
     * @return bool
     */
    public function save(string $fileName, array $data): bool
    {
        $fp = fopen($fileName, 'w');

        /** @var Card $field */
        foreach ($data as $weather) {
            fputcsv($fp, [
                $weather->getCity(),
                $weather->getDate(),
                $weather->getTemperature(),
            ]);
        }
        fclose($fp);

        return true;
    }
}