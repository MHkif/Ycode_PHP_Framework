<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application();

$app->router->get('/', 'home');
$app->router->get('/login', function () {
    echo 'Login Page';
});
$app->router->get('/register', function () {
    echo 'Register Page';
});

$app->run();
