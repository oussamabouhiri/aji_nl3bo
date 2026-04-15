<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Controller\CategoryController;


// DEFINE ROUTES

// For exemple 
Router::get('categories', [CategoryController::class, 'index']);
Router::post('categories/create', [CategoryController::class, 'create']);
Router::post('categories/update/{id}', [CategoryController::class, 'update']);
Router::post('categories/delete/{id}', [CategoryController::class, 'delete']);

Router::match();
