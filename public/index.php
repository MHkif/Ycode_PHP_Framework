<?php

use app\core\Http\Controllers\SiteController;
use app\core\Http\Controllers\AuthController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'] 
    ] 
    ];

$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'index']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);


$app->run();
