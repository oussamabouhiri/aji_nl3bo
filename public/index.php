<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

use App\Route\Router;

// Charger les routes
require __DIR__ . '/../routes/web.php';

// Lancer le router
Router::match();