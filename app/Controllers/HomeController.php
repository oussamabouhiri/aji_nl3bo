<?php
namespace App\Controllers;

use App\Helper\Utility;

class HomeController {
    public function index() {
        Utility::view('home');
    }
}