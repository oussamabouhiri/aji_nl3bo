<?php

namespace App\Middleware;

use App\Helper\Utility;

class Middleware
{
    
    public function auth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utility::redirect('/login');
            exit;
        }
    }

    
    public function guest(): void
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_role'] === 'admin') {
                Utility::redirect('/admin');
            } else {
                Utility::redirect('/');
            }
            exit;
        }
    }

    
    public function admin(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utility::redirect('/login');
            exit;
        }
        
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            Utility::redirect('/');
            exit;
        }
    }
}
