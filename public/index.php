<?php


require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../bootsrap/functions.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = require_once __DIR__ . '/../bootsrap/app.php';

$app->run();
