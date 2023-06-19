<?php

use Main\app\Http\Controllers\SiteController;
use Main\app\Http\Controllers\AuthController;
use Main\app\Router;


Router::get('/', [SiteController::class, 'index']);
Router::get('/login', [SiteController::class, 'login']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/register', [SiteController::class, 'register']);
Router::post('/register', [AuthController::class, 'register']);
