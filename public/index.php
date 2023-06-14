<?php

use Main\app\Http\Controllers\SiteController;
use Main\app\Http\Controllers\AuthController;
use Main\app\Router;


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../bootsrap/functions.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();




$app = require_once __DIR__.'/../bootsrap/app.php';

Router::get('/', [SiteController::class, 'index']);
Router::get('/login', [SiteController::class, 'login']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/register', [SiteController::class, 'register']);
Router::post('/register', [AuthController::class, 'register']);


$app->run();
