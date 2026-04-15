<?php

use App\Route\Router;
use App\Controllers\GameController;

// LIST
Router::get('/games', [GameController::class, 'index']);

// CREATE
Router::get('/games/create', [GameController::class, 'createForm']);
Router::post('/games/create', [GameController::class, 'store']);

// EDIT
Router::get('/games/edit/{id:\d+}', [GameController::class, 'edit']);
Router::post('/games/update/{id:\d+}', [GameController::class, 'update']);

// DELETE (POST ⚠️)
Router::post('/games/delete/{id:\d+}', [GameController::class, 'delete']);