<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Controller\AuthController;

// DEFINE ROUTES

Router::get('login', [AuthController::class, 'index']);

Router::match();
