<?php
require 'vendor/autoload.php';
$config = require 'config/app.php';
echo "BASE_URL: " . $config['base_url'] . PHP_EOL;

// Test router
use App\Route\Router;

$request = Router::request();
echo "Request path: " . $request['path'] . PHP_EOL;
