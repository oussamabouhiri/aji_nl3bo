<?php
namespace App\Controllers;

use App\Helper\Utility;

class HomeController {
    public function index() {
        $isLoggedIn = isset($_SESSION['user_id']);
        $isAdmin = $isLoggedIn && ($_SESSION['user_role'] ?? '') === 'admin';
        
        Utility::view('home', [
            'isLoggedIn' => $isLoggedIn,
            'isAdmin' => $isAdmin
        ]);
    }
}