<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../routes/web.php';
require_once __DIR__ . '/functions.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = require_once '../config/config.php';

$app = new Main\app\Application(dirname(__DIR__), $config);

return $app;
