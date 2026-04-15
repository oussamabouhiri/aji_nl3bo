<?php

use App\Route\Router;
use App\Controllers\CategoryController;
use App\Controllers\GameController;
use App\Controllers\DashboardController;

// Categories
Router::get('/categories', [CategoryController::class, 'index']);
Router::post('/categories/create', [CategoryController::class, 'create']);
Router::post('/categories/update/{id:\d+}', [CategoryController::class, 'update']);
Router::post('/categories/delete/{id:\d+}', [CategoryController::class, 'delete']);

// Games
Router::get('/games', [GameController::class, 'index']);
Router::get('/games/create', [GameController::class, 'createForm']);
Router::post('/games/create', [GameController::class, 'store']);
Router::get('/games/edit/{id:\d+}', [GameController::class, 'edit']);
Router::post('/games/update/{id:\d+}', [GameController::class, 'update']);
Router::post('/games/delete/{id:\d+}', [GameController::class, 'delete']);

// Dashboard
Router::get('/admin/dashboard', [DashboardController::class, 'index']);