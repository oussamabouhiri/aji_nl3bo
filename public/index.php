<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Controller\AuthController;

Router::get('login', [AuthController::class, 'loginForm']);
    // ->middleware('guest');
Router::post('login', [AuthController::class, 'login']);
    // ->middleware('guest');

Router::get('register', [AuthController::class, 'registerForm']);
    // ->middleware('guest');
Router::post('register', [AuthController::class, 'register']);
    // ->middleware('guest');

Router::get('logout', [AuthController::class, 'logout']);
    // ->middleware('auth');

Router::get('/', [AuthController::class, 'loginForm']);
    // ->middleware('guest');

Router::match();
