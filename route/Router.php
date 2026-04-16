<?php

namespace App\Route;

use App\Middleware\Middleware;

$config = require __DIR__ . '/../config/app.php';

define('BASE_URL', $config['base_url']);

class Router {
    static private array $routes = [];
    static private int $currentRouteIndex;
    static private array $config = [];

    static public function init(array $config): void {
        self::$config = $config;
    }

    static public function get(string $pattern, array $callback): self {
        $route = [
            'method' => 'GET',
            'pattern' => $pattern,
            'callback' => $callback,
            'middleware' => []
        ];
        self::$routes[] = $route;
        self::$currentRouteIndex = count(self::$routes) - 1;
        return new self;
    }

    static public function post(string $pattern, array $callback): self {
        $route = [
            'method' => 'POST',
            'pattern' => $pattern,
            'callback' => $callback,
            'middleware' => []
        ];
        self::$routes[] = $route;
        self::$currentRouteIndex = count(self::$routes) - 1;
        return new self;
    }

    static public function middleware(string $method, array $args = []): self {
        if (isset(self::$currentRouteIndex)) {
            self::$routes[self::$currentRouteIndex]['middleware'][] = [$method, $args];
        }
        return new self;
    }

    static public function request(): array {
        if (isset($_GET['url'])) {
            $path = '/' . rtrim(ltrim($_GET['url'], '/'), '/');
            if ($path === '') $path = '/';
        } else {
            $basePath = self::$config['base_path'] ?? '/';
            $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
            $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
            // Use case-insensitive replace to prevent 404s when folder name case doesn't match URL
            $path = str_ireplace($basePath, '', $path);
            $path = '/' . ltrim($path, '/');
            $path = rtrim($path, '/');
            if ($path === '') $path = '/';
        }

        return [
            'path' => $path, 
            'method' => $_SERVER['REQUEST_METHOD'] ?? 'CLI'
        ];
    }

    static public function match(): void {
        $request = self::request();

        foreach (self::$routes as $route) {
            if ($route['method'] !== $request['method']) continue;

            $patternRegex = preg_replace_callback(
                '#\{([\w]+)(?::([a-zA-Z0-9_-]+))?\}#', 
                fn($matches) => isset($matches[2]) ? $matches[2] : '(?P<' . $matches[1] . '>[^/]+)',
                $route['pattern']
            );
            
            if (preg_match("#^$patternRegex$#", $request['path'], $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) $params[$key] = $value;
                }
                
                if (!empty($route['middleware'])) {
                    foreach ($route['middleware'] as $middleware) {
                        [$middlewareMethod, $args] = $middleware;
                        call_user_func_array([new Middleware(), $middlewareMethod], $args);
                    }
                }
                
                [$class, $method] = $route['callback'];
                $controller = new $class();
                if (!empty($params)) {
                    call_user_func_array([$controller, $method], [$params]);
                } else {
                    call_user_func_array([$controller, $method], []);
                }
                return;
            }
        }

        // Show debug info
        echo '<pre>';
        echo '404 Not Found' . PHP_EOL;
        echo 'Path: ' . $request['path'] . PHP_EOL;
        echo 'Method: ' . $request['method'] . PHP_EOL;
        echo 'Routes defined:' . PHP_EOL;
        foreach (self::$routes as $r) {
            echo '  ' . $r['method'] . ' ' . $r['pattern'] . PHP_EOL;
        }
        echo '</pre>';
    }
}

// Route parameter patterns:
// {id}           - any string (default)
// {id:\d+}       - digits only
// {id:[a-z]+}    - lowercase letters only
// {id:[A-Z]+}    - uppercase letters only
// {id:[a-zA-Z0-9_-]+} - alphanumeric + dash/underscore

Router::init($config);