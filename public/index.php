<?php

session_start() === PHP_SESSION_NONE ? session_start() : null;

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;


// DEFINE ROUTES

// For exemple 
// Router::get('login', [AuthController::class, 'index']);

Router::match();
