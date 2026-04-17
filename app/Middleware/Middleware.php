<?php

namespace App\Middleware;

use App\Helper\Utility;

class Middleware
{
    
    public function auth(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (empty($_SESSION['user_id'])) {
            Utility::redirect('/login');
        }
    }

    
    public function guest(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Skip middleware for login/register - they're public
        // This middleware is now optional for guests only
    }

    
    public function admin(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (empty($_SESSION['user_id'])) {
            Utility::redirect('/login');
            return;
        }
        
        if (empty($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            Utility::redirect('/');
        }
    }

    
    public function user(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (empty($_SESSION['user_id'])) {
            Utility::redirect('/login');
            return;
        }
        
        if (!empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            Utility::redirect('/admin');
        }
    }
}
