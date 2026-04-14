<?php

namespace App\Model;

use App\Src\Database;

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
}
