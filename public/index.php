<?php

use app\core\Http\Controllers\SiteController;
use app\core\Http\Controllers\AuthController;
use app\core\Application;
use app\core\Router;


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


Router::get('/', [SiteController::class, 'index']);
Router::get('/login', [SiteController::class, 'login']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/register', [SiteController::class, 'register']);
Router::post('/register', [AuthController::class, 'register']);


$app->run();
