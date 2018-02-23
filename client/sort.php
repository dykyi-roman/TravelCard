<?php

require_once "../vendor/autoload.php";

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$data = $request->get('data');
if ($data === null) {
    echo '';
    exit();
}

$data = json_decode($data);

//....

$response = new \Symfony\Component\HttpFoundation\JsonResponse(
    'Content',
    \Symfony\Component\HttpFoundation\Response::HTTP_OK
);

//$response->setData($data);
$response->setData([1,0,2,3]);
$response->send();