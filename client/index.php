<?php

require_once "../vendor/autoload.php";

use API\SortCard;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$data = $request->get('data');
if ($data === null) {
    echo 'Some Error message';
    exit();
}

$response = new JsonResponse('Content', Response::HTTP_OK);
$sortCard = SortCard::sort(json_decode($data));
$response->setData(SortCard::getIndexFromSortingCard($sortCard))->send();