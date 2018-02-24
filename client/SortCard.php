<?php

namespace API;

/**
 * Class SortCard
 * @package API
 */
class SortCard
{
    /**
     * @param array $data
     * @param int $changeCount
     * @return array
     */
    public static function sort(array $data, int $changeCount = 0): array
    {
        if ($changeCount > count($data)) {
            return $data;
        }

        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
            for ($j = 1, $jMax = count($data); $j < $jMax; $j++) {
                if ($data[$i][0] === $data[$j][1]) {
                    $k = $i < $j ? $i : $j;
                    array_splice($data, $k, 0, [$data[$j]]);
                    unset($data[$j + 1]);
                    $data = array_values($data);
                    return self::sort($data, ++$changeCount);
                }
            }
        }

        return $data;
    }

    /**
     * @param array $array
     * @return array
     */
    public static function getIndexFromSortingCard(array $array): array
    {
        $result = [];
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            $result[] = $array[$i][2];
        }

        return $result;
    }

}


