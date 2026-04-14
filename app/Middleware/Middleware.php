<?php

namespace App\Middleware;

use App\Helper\Utility;
use App\Service\AuthService;

class Middleware
{
    
    public function auth(): void
    {
        if (!AuthService::check()) {
            Utility::redirect('/login');
        }
    }

    
    public function guest(): void
    {
        if (AuthService::check()) {
            $user = AuthService::user();
            if ($user['role'] === 'admin') {
                Utility::redirect('/admin/dashboard');
            } else {
                Utility::redirect('/dashboard');
            }
        }
    }

    
    public function admin(): void
    {
        if (!AuthService::check()) {
            Utility::redirect('/login');
        }
        if (!AuthService::isAdmin()) {
            Utility::redirect('/dashboard');
        }
    }
}