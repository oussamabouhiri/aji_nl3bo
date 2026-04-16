<?php

namespace App\Helper;

class Utility {
    public static function view(string $path, array $data = []): void {
        if (!defined('BASE_URL')) {
            $config = require dirname(__DIR__) . '/../config/app.php';
            define('BASE_URL', $config['base_url']);
        }
        
        extract($data);
        $viewPath = dirname(__DIR__) . '/Views/' . $path . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View not found: $viewPath";
        }
    }

    public static function redirect(string $url): void {
        $config = require dirname(__DIR__) . '/../config/app.php';
        $url = str_starts_with($url, '/') ? $url : '/' . $url;
        header('Location: ' . $config['base_url'] . "/" . ltrim($url, '/'));
        exit;
    }

    public static function abort(int $code = 404): void {
        http_response_code($code);
        include dirname(__DIR__, 2) . '/Views/errors/' . $code . '.php';
        exit;
    }

    public static function auth(): bool {
        return isset($_SESSION['user_id']);
    }

    public static function requireAuth(): void {
        if (!self::auth()) {
            self::redirect('/login');
        }
    }

    public static function isAdmin(): bool {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }

    public static function requireAdmin(): void {
        if (!self::isAdmin()) {
            self::abort(403);
        }
    }

    public static function url(string $path): string {
        $config = require dirname(__DIR__) . '/../config/app.php';
        return $config['base_url'] . $path;
    }

}
