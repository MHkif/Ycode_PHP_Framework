<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Http\Controllers\SiteController;
use app\core\Http\Controllers\AuthController;
use app\core\Application;



$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class, 'index']);
// $app->router->post('/', [SiteController::class, 'index']);

$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->run();
