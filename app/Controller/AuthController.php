<?php

namespace App\Controller;

use App\Helper\Utility;

class AuthController {

    public function index() {
        return Utility::view('admin/games');   
    }
}