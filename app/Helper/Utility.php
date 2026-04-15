<?php

namespace App\Helper;

class Utility
{
    public static function view(string $path, array $data = []): void
    {
        extract($data);
        include dirname(__DIR__) . '/View/' . $path . '.php';
    }

    public static function redirect(string $url): void
    {
        $config = require dirname(__DIR__, 2) . '/config/app.php';
        $url = str_starts_with($url, '/') ? $url : '/' . $url;
        header('Location: ' . rtrim($config['base_url'], '/') . $url);
        exit;
    }

    public static function abort(int $code = 404): void
    {
        http_response_code($code);
        include dirname(__DIR__) . '/View/errors/' . $code . '.php';
        exit;
    }

    public static function old(string $key, array $old = []): string
    {
        return htmlspecialchars($old[$key] ?? '', ENT_QUOTES, 'UTF-8');
    }

    public static function baseUrl(): string
    {
        $config = require dirname(__DIR__, 2) . '/config/app.php';
        return rtrim($config['base_url'], '/') . '/';
    }
}
