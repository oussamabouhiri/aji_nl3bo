<?php

namespace App\Models;

use App\Database\Database;

class User extends Database
{
    public function findByEmail(string $email): array|false
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("User::findByEmail - " . $e->getMessage());
            return false;
        }
    }

    public function findById(int $id): array|false
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("User::findById - " . $e->getMessage());
            return false;
        }
    }

    public function create(array $data): int|false
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO users (name, email, password, phone, role) 
                 VALUES (:name, :email, :password, :phone, :role)"
            );
            $result = $stmt->execute([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => $data['password'],
                'phone'    => $data['phone'] ?? '',
                'role'     => $data['role'] ?? 'user',
            ]);
            return $result ? (int) $this->db->lastInsertId() : false;
        } catch (\Exception $e) {
            error_log("User::create - " . $e->getMessage());
            return false;
        }
    }

    public function emailExists(string $email): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            return (int) $stmt->fetchColumn() > 0;
        } catch (\Exception $e) {
            error_log("User::emailExists - " . $e->getMessage());
            return false;
        }
    }

    public function updateProfile(int $id, array $data): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, phone = :phone, image = :image WHERE id = :id");
            return $stmt->execute([
                'id'    => $id,
                'name'  => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'image' => $data['image'] ?? null,
            ]);
        } catch (\Exception $e) {
            error_log("User::updateProfile - " . $e->getMessage());
            return false;
        }
    }

    public function updatePassword(int $id, string $password): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
            return $stmt->execute([
                'id'       => $id,
                'password' => $password,
            ]);
        } catch (\Exception $e) {
            error_log("User::updatePassword - " . $e->getMessage());
            return false;
        }
    }
}
