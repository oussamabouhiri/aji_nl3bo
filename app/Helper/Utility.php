<?php

namespace App\Helper;

class Utility {
    public static function view(string $path, array $data = []): void {
        extract($data);
        include dirname(__DIR__) . '/View/' . $path . '.php';
    }

    public static function redirect(string $url): void {
        $config = require dirname(__DIR__) . '/../config/app.php';
        $url = str_starts_with($url, '/') ? $url : '/' . $url;
        header('Location: ' . $config['base_url'] . "/" . ltrim($url, '/'));
        exit;
    }

    public static function abort(int $code = 404): void {
        http_response_code($code);
        include dirname(__DIR__) . '/app/View/errors/' . $code . '.php';
        exit;
    }
}
