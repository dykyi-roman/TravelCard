<?php

require_once "vendor/autoload.php";

use Dotenv\Dotenv;

(new Dotenv(__DIR__))->load();

$app = \Dykyi\App\ApplicationFactory::create(php_sapi_name());
$app->run();