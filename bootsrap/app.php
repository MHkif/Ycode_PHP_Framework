<?php

$config = require_once 'config.php';

$app = new Main\app\Application(dirname(__DIR__), $config);

return $app;
