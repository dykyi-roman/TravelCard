<?php

require_once "../vendor/autoload.php";

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$data = $request->get('data');
if ($data === null) {
    echo '';
    exit();
}

function sortCard(array $data, int $changeCount = 0): array
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
                return sortCard($data, ++$changeCount);
            }
        }
    }

    return $data;
}

function getCardIndex(array $array): array
{
    $result = [];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        $result[] = $array[$i][2];
    }

    return $result;
}

$response = new \Symfony\Component\HttpFoundation\JsonResponse(
    'Content',
    \Symfony\Component\HttpFoundation\Response::HTTP_OK
);

$data = json_decode($data);
$sortCard = sortCard($data);

$response->setData(getCardIndex($sortCard));
$response->send();