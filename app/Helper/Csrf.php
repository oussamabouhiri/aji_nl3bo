<?php

namespace App\Helper;

class Csrf {
    private const TOKEN_NAME = 'csrf_token';
    private const TOKEN_LENGTH = 32;

    public static function generate(): string {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $token = bin2hex(random_bytes(self::TOKEN_LENGTH));
        $_SESSION[self::TOKEN_NAME] = $token;
        
        return $token;
    }

    public static function getTokenName(): string {
        return self::TOKEN_NAME;
    }

    public static function getToken(): string {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return $_SESSION[self::TOKEN_NAME] ?? self::generate();
    }

    public static function validate(?string $token = null): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $token = $token ?? ($_POST[self::TOKEN_NAME] ?? null);
        
        if ($token === null || !isset($_SESSION[self::TOKEN_NAME])) {
            return false;
        }
        
        return hash_equals($_SESSION[self::TOKEN_NAME], $token);
    }

    public static function field(): string {
        return '<input type="hidden" name="' . self::getTokenName() . '" value="' . self::getToken() . '">';
    }
}
