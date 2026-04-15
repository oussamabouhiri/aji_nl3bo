<?php

namespace App\Controller;

use App\Helper\Utility;
use App\Model\User;
use App\Service\AuthService;

class UserController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

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
        $user = AuthService::user();
        $userData = $this->userModel->findById($user['id']);
        
        $_SESSION['user_email'] = $userData['email'] ?? '';
        $_SESSION['user_phone'] = $userData['phone'] ?? '';
        $_SESSION['user_image'] = $userData['image'] ?? '';
        
        Utility::view('user/profile');
    }

    public function reservation(): void
    {
        Utility::view('user/reservation');
    }

    public function updateProfile(): void
    {
        $user = AuthService::user();
        
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if (empty($name) || empty($email)) {
            Utility::redirect('/profile?error=Name and email are required');
            return;
        }

        $imagePath = null;
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/profile/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newFileName = 'user_' . $user['id'] . '_' . time() . '.' . $fileExt;
            $targetPath = $uploadDir . $newFileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imagePath = '/uploads/profile/' . $newFileName;
            }
        }

        $updateData = [
            'name'  => $name,
            'email' => $email,
            'phone' => $phone,
        ];
        
        if ($imagePath) {
            $updateData['image'] = $imagePath;
        }

        $this->userModel->updateProfile($user['id'], $updateData);

        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_phone'] = $phone;
        
        if ($imagePath) {
            $_SESSION['user_image'] = $imagePath;
        }

        Utility::redirect('/profile?success=Profile updated successfully');
    }

    public function updatePassword(): void
    {
        $user = AuthService::user();
        
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword     = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            Utility::redirect('/profile?error=All password fields are required');
            return;
        }

        if ($newPassword !== $confirmPassword) {
            Utility::redirect('/profile?error=New passwords do not match');
            return;
        }

        if (strlen($newPassword) < 6) {
            Utility::redirect('/profile?error=Password must be at least 6 characters');
            return;
        }

        $userData = $this->userModel->findById($user['id']);
        
        if (!password_verify($currentPassword, $userData['password'])) {
            Utility::redirect('/profile?error=Current password is incorrect');
            return;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->userModel->updatePassword($user['id'], $hashedPassword);

        Utility::redirect('/profile?success=Password updated successfully');
    }
}