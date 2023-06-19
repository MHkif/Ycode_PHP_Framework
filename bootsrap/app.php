<?php

require_once '../routes/web.php';

$config = require_once '../config/config.php';
$app = new Main\app\Application(dirname(__DIR__), $config);

return $app;
