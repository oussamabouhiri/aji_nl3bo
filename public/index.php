<?php

session_start() === PHP_SESSION_NONE ? session_start() : null;

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;
use App\Middleware\Middleware;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\GameController;
use App\Controllers\ReservationController;
use App\Controllers\SessionController;
use App\Controllers\UserController;


// DEFINE ROUTES

// =====================
// PUBLIC ROUTES
// =====================

// Home / Games (public)
Router::get('/', [UserController::class, 'home']);
Router::get('/games', [UserController::class, 'games']);
Router::get('/games/{id}', [UserController::class, 'gameDetail']);

// Auth routes (guests only - redirect if logged in)
Router::get('/login', [UserController::class, 'login'])->middleware('guest');
Router::post('/login', [UserController::class, 'login'])->middleware('guest');
Router::get('/register', [UserController::class, 'register'])->middleware('guest');
Router::post('/register', [UserController::class, 'register'])->middleware('guest');

// Logout (auth required)
Router::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// =====================
// PROTECTED USER ROUTES
// =====================

// Reservation (auth required)
Router::get('/reservation', [UserController::class, 'reservation'])->middleware('auth');
Router::post('/reservation/create', [UserController::class, 'createReservation'])->middleware('auth');
Router::post('/reservation/cancel', [UserController::class, 'cancelReservation'])->middleware('auth');

// My Reservations (auth required)
Router::get('/my-reservations', [UserController::class, 'myReservations'])->middleware('auth');

// Profile (auth required)
Router::get('/profile', [UserController::class, 'profile'])->middleware('auth');

// =====================
// ADMIN ROUTES
// =====================

// Admin Dashboard
Router::get('/admin', [AdminController::class, 'dashboard'])->middleware('admin');

// Categories (admin)
Router::get('/admin/categories', [CategoryController::class, 'index'])->middleware('admin');
Router::post('/admin/categories/create', [CategoryController::class, 'create'])->middleware('admin');
Router::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->middleware('admin');
Router::post('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->middleware('admin');

// Admin Reservations
Router::get('/admin/reservations', [ReservationController::class, 'index'])->middleware('admin');
Router::get('/admin/reservations/view/{id}', [ReservationController::class, 'view'])->middleware('admin');
Router::post('/admin/reservations/create', [ReservationController::class, 'create'])->middleware('admin');
Router::post('/admin/reservations/update', [ReservationController::class, 'update'])->middleware('admin');
Router::post('/admin/reservations/confirm', [ReservationController::class, 'confirm'])->middleware('admin');
Router::post('/admin/reservations/cancel', [ReservationController::class, 'cancel'])->middleware('admin');
Router::post('/admin/reservations/restore', [ReservationController::class, 'restore'])->middleware('admin');
Router::post('/admin/reservations/start-session/{id}', [ReservationController::class, 'startSession'])->middleware('admin');
Router::post('/admin/reservations/delete', [ReservationController::class, 'delete'])->middleware('admin');

// Sessions (admin)
Router::get('/admin/sessions', [SessionController::class, 'index'])->middleware('admin');
Router::get('/admin/sessions/history', [SessionController::class, 'history'])->middleware('admin');
Router::get('/admin/sessions/view/{id}', [SessionController::class, 'view'])->middleware('admin');
Router::post('/admin/sessions/start', [SessionController::class, 'start'])->middleware('admin');
Router::post('/admin/sessions/changeGame', [SessionController::class, 'changeGame'])->middleware('admin');
Router::post('/admin/sessions/end', [SessionController::class, 'end'])->middleware('admin');
Router::post('/admin/sessions/delete', [SessionController::class, 'delete'])->middleware('admin');

// Games Admin
Router::get('/admin/games', [GameController::class, 'index'])->middleware('admin');
Router::get('/admin/games/create', [GameController::class, 'create'])->middleware('admin');
Router::get('/admin/games/edit/{id}', [GameController::class, 'edit'])->middleware('admin');
Router::post('/admin/games/store', [GameController::class, 'store'])->middleware('admin');
Router::post('/admin/games/update', [GameController::class, 'update'])->middleware('admin');
Router::post('/admin/games/delete/{id}', [GameController::class, 'delete'])->middleware('admin');

// Settings (admin)
Router::get('/admin/settings', [CategoryController::class, 'index'])->middleware('admin');


Router::match();
