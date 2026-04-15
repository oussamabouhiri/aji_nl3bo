<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Controller\AuthController;
use App\Controller\CategoryController;
use App\Controller\AdminController;
use App\Controller\UserController;

Router::get('login', [AuthController::class, 'loginForm'])
    ->middleware('guest');
Router::post('login', [AuthController::class, 'login'])
    ->middleware('guest');

Router::get('register', [AuthController::class, 'registerForm'])
    ->middleware('guest');
Router::post('register', [AuthController::class, 'register'])
    ->middleware('guest');

Router::get('logout', [AuthController::class, 'logout'])
    ->middleware('auth');

Router::get('/', [AuthController::class, 'loginForm'])
    ->middleware('guest');

// Admin routes
Router::get('admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('admin');
Router::get('admin/games', [AdminController::class, 'games'])
    ->middleware('admin');
Router::get('admin/reservations', [AdminController::class, 'reservations'])
    ->middleware('admin');
Router::get('admin/sessions', [AdminController::class, 'sessions'])
    ->middleware('admin');
Router::get('admin/session-history', [AdminController::class, 'sessionHistory'])
    ->middleware('admin');

// Admin categories
Router::get('categories', [CategoryController::class, 'index'])
    ->middleware('admin');
Router::post('categories/create', [CategoryController::class, 'create'])
    ->middleware('admin');
Router::post('categories/update/{id}', [CategoryController::class, 'update'])
    ->middleware('admin');
Router::post('categories/delete/{id}', [CategoryController::class, 'delete'])
    ->middleware('admin');

// User routes
Router::get('dashboard', [UserController::class, 'dashboard'])
    ->middleware('auth');
Router::get('games', [UserController::class, 'games'])
    ->middleware('auth');
Router::get('profile', [UserController::class, 'profile'])
    ->middleware('auth');
Router::get('reservation', [UserController::class, 'reservation'])
    ->middleware('auth');
Router::post('profile/update', [UserController::class, 'updateProfile'])
    ->middleware('auth');
Router::post('profile/password', [UserController::class, 'updatePassword'])
    ->middleware('auth');

Router::match();
