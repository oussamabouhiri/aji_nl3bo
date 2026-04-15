<?php

namespace App\Controllers;

use App\Helper\Utility;

class AdminController
{
    public function dashboard(): void
    {
        Utility::view('admin/dashboard');
    }

    public function games(): void
    {
        Utility::view('admin/games');
    }

    public function reservations(): void
    {
        Utility::view('admin/reservations');
    }

    public function sessions(): void
    {
        Utility::view('admin/sessions');
    }

    public function sessionHistory(): void
    {
        Utility::view('admin/session_history');
    }
}
