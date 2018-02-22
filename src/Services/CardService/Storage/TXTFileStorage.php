<?php

namespace Dykyi\Services\CardService\Storage;

/**
 * Class TXTFileStorage
 * @package Dykyi\Services\CardService\Storage
 */
class TXTFileStorage implements FileStorageInterface
{
    /**
     * @param string $fileName
     * @param array $data
     *
     * @return bool
     */
    public function save(string $fileName, array $data): bool
    {
        //TODO: save logic
        return true;
    }
}