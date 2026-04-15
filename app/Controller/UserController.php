<?php

namespace App\Controller;

use App\Helper\Utility;

class UserController
{
    public function dashboard(): void
    {
        Utility::view('user/dashboard');
    }

    public function games(): void
    {
        Utility::view('user/games');
    }

    public function profile(): void
    {
        Utility::view('user/profile');
    }

    public function reservation(): void
    {
        Utility::view('user/reservation');
    }
}
