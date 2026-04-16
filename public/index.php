<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start() === PHP_SESSION_NONE ? session_start() : null;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../route/web.php';


