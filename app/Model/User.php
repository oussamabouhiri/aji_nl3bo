<?php

namespace App\Model;

use App\Database\Database;

class User extends Database
{
    public function findByEmail(string $email): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password, phone, role) 
             VALUES (:name, :email, :password, :phone, :role)"
        );
        return $stmt->execute([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
            'phone'    => $data['phone'],
            'role'     => $data['role'] ?? 'user',
        ]);
    }

    public function emailExists(string $email): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return (int) $stmt->fetchColumn() > 0;
    }

    public function updateProfile(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, phone = :phone, image = :image WHERE id = :id");
        return $stmt->execute([
            'id'    => $id,
            'name'  => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'image' => $data['image'] ?? null,
        ]);
    }

    public function updatePassword(int $id, string $password): bool
    {
        $stmt = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
        return $stmt->execute([
            'id'       => $id,
            'password' => $password,
        ]);
    }
}
