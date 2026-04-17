<?php

use App\Route\Router;
require_once __DIR__ . '/Router.php';

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\CategoryController;
use App\Controllers\GameController;
use App\Controllers\HomeController;
use App\Controllers\ReservationController;
use App\Controllers\SessionController;
use App\Controllers\UserController;


// =====================
// PUBLIC ROUTES
// =====================

// Home (public)
Router::get('/', [HomeController::class, 'index']);
Router::get('/home', [HomeController::class, 'index']);


// Auth routes (guests only - redirect if logged in)
Router::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Router::post('/login', [AuthController::class, 'login'])->middleware('guest');
Router::get('/register', [AuthController::class, 'registerForm'])->middleware('guest');
Router::post('/register', [AuthController::class, 'register'])->middleware('guest');

// Logout (auth required)
Router::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// =====================
// PROTECTED USER ROUTES
// =====================

//
Router::get('/dashboard', [UserController::class, 'dashboard'])->middleware('user');

// Reservation (auth required)
Router::get('/reservation', [UserController::class, 'reservation'])->middleware('user');
Router::post('/reservation/create', [ReservationController::class, 'createUser'])->middleware('user');
Router::post('/reservation/cancel', [UserController::class, 'cancelReservation'])->middleware('user');
Router::get('/reservation/available', [UserController::class, 'getAvailable'])->middleware('user');

// My Reservations (auth required)
Router::get('/my-reservations', [UserController::class, 'myReservations'])->middleware('user');

// Profile (auth required)
Router::get('/profile', [UserController::class, 'profile'])->middleware('user');
Router::get('/profile/edit', [UserController::class, 'editProfile'])->middleware('user');
Router::post('/profile/update', [UserController::class, 'updateProfile'])->middleware('user');

// Games (auth required)
Router::get('/games', [UserController::class, 'games'])->middleware('user');
Router::get('/games/{id}', [UserController::class, 'gameDetail'])->middleware('user');

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
Router::post('/admin/reservations/confirm/{id}', [ReservationController::class, 'confirm'])->middleware('admin');
Router::post('/admin/reservations/cancel/{id}', [ReservationController::class, 'cancel'])->middleware('admin');
Router::post('/admin/reservations/restore/{id}', [ReservationController::class, 'restore'])->middleware('admin');
Router::post('/admin/reservations/start-session/{id}', [ReservationController::class, 'startSession'])->middleware('admin');
Router::post('/admin/reservations/delete/{id}', [ReservationController::class, 'delete'])->middleware('admin');

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
