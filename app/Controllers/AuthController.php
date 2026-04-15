<?php

namespace App\Controllers;

use App\Helper\Utility;
use App\Helper\Csrf;
use App\Service\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function loginForm(): void
    {
        Utility::view('auth/login');
    }

    public function login(): void
    {
        if (!Csrf::validate()) {
            Utility::redirect('/login');
            return;
        }
        
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $errors   = [];

        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
        if (empty($password)) {
            $errors[] = 'Password is required.';
        }

        if (!empty($errors)) {
            Utility::view('auth/login', [
                'errors' => $errors,
                'old'    => ['email' => $email],
            ]);
            return;
        }

        $user = $this->authService->attempt($email, $password);

        if (!$user) {
            Utility::view('auth/login', [
                'errors' => ['Invalid email or password.'],
                'old'    => ['email' => $email],
            ]);
            return;
        }

        if ($user['role'] === 'admin') {
            Utility::redirect('/admin/dashboard');
        } else {
            Utility::redirect('/dashboard');
        }
    }

    public function registerForm(): void
    {
        Utility::view('auth/register');
    }

    public function register(): void
    {
        if (!Csrf::validate()) {
            Utility::redirect('/register');
            return;
        }
        
        $name     = trim($_POST['name'] ?? '');
        $phone    = trim($_POST['phone'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $errors   = [];

        if (empty($name) || strlen($name) < 2) {
            $errors[] = 'Full name is required (min 2 characters).';
        }
        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
        if (empty($password) || strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters.';
        }

        if (!empty($errors)) {
            Utility::view('auth/register', [
                'errors' => $errors,
                'old'    => ['name' => $name, 'email' => $email, 'phone' => $phone],
            ]);
            return;
        }

        $success = $this->authService->register([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
            'phone'    => $phone,
            'role'     => 'user',
        ]);

        if (!$success) {
            Utility::view('auth/register', [
                'errors' => ['This email is already registered.'],
                'old'    => ['name' => $name, 'email' => $email, 'phone' => $phone],
            ]);
            return;
        }

        Utility::redirect('/login');
    }

    public function logout(): void
    {
        $this->authService->logout();
        Utility::redirect('/login');
    }
}
