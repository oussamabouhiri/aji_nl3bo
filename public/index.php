<?php

session_start() === PHP_SESSION_NONE ? session_start() : null;

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Controller\CategoryController;
use App\Controller\GameController;
use App\Controller\ReservationController;
use App\Controller\SessionController;
use App\Controller\UserController;


// DEFINE ROUTES

// =====================
// PUBLIC USER ROUTES
// =====================

// Home / Games
Router::get('/', [UserController::class, 'home']);
Router::get('/games', [UserController::class, 'games']);
Router::get('/games/{id}', [UserController::class, 'gameDetail']);

// Reservation (user-facing)
Router::get('/reservation', [UserController::class, 'reservation']);
Router::post('/reservation/create', [UserController::class, 'createReservation']);
Router::post('/reservation/cancel', [UserController::class, 'cancelReservation']);

// My Reservations (user)
Router::get('/my-reservations', [UserController::class, 'myReservations']);

// Profile
Router::get('/profile', [UserController::class, 'profile']);

// Auth
Router::get('/login', [UserController::class, 'login']);
Router::post('/login', [UserController::class, 'login']);
Router::get('/register', [UserController::class, 'register']);
Router::post('/register', [UserController::class, 'register']);
Router::get('/logout', [UserController::class, 'logout']);

// =====================
// ADMIN ROUTES
// =====================

// Admin Dashboard
Router::get('/admin', [SessionController::class, 'dashboard']);
Router::get('/admin/', [SessionController::class, 'dashboard']);

// Categories
Router::get('/admin/categories', [CategoryController::class, 'index']);
Router::post('/admin/categories/create', [CategoryController::class, 'create']);
Router::post('/admin/categories/update/{id}', [CategoryController::class, 'update']);
Router::post('/admin/categories/delete/{id}', [CategoryController::class, 'delete']);

// Admin Reservations
Router::get('/admin/reservations', [ReservationController::class, 'index']);
Router::get('/admin/reservations/view/{id}', [ReservationController::class, 'view']);
Router::post('/admin/reservations/create', [ReservationController::class, 'create']);

Router::post('/admin/reservations/update', [ReservationController::class, 'update']);
Router::post('/admin/reservations/confirm', [ReservationController::class, 'confirm']);
Router::post('/admin/reservations/cancel', [ReservationController::class, 'cancel']);
Router::post('/admin/reservations/restore', [ReservationController::class, 'restore']);

Router::post('/admin/reservations/start-session/{id}', [ReservationController::class, 'startSession']);
Router::post('/admin/reservations/delete', [ReservationController::class, 'delete']);

// Sessions
Router::get('/admin/sessions', [SessionController::class, 'index']);
Router::get('/admin/sessions/history', [SessionController::class, 'history']);
Router::get('/admin/sessions/view/{id}', [SessionController::class, 'view']);
Router::post('/admin/sessions/start', [SessionController::class, 'start']);
Router::post('/admin/sessions/changeGame', [SessionController::class, 'changeGame']);
Router::post('/admin/sessions/end', [SessionController::class, 'end']);
Router::post('/admin/sessions/delete', [SessionController::class, 'delete']);

// Games (Admin)
Router::get('/admin/games', [GameController::class, 'index']);
Router::get('/admin/games/create', [GameController::class, 'create']);
Router::get('/admin/games/edit/{id}', [GameController::class, 'edit']);
Router::post('/admin/games/store', [GameController::class, 'store']);
Router::post('/admin/games/update', [GameController::class, 'update']);
Router::post('/admin/games/delete/{id}', [GameController::class, 'delete']);

// Settings
Router::get('/admin/settings', [CategoryController::class, 'index']);


Router::match();
