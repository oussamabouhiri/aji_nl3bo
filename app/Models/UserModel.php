<?php

namespace App\Models;

use App\Database\Database;

class UserModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM users ORDER BY created_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log("UserModel::getAll - " . $e->getMessage());
            return [];
        }
    }

    public function getById(int $id): array|false
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("UserModel::getById - " . $e->getMessage());
            return false;
        }
    }

    public function getByEmail(string $email): array|false
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("UserModel::getByEmail - " . $e->getMessage());
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
            error_log("UserModel::create - " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id");
            return $stmt->execute([
                'id'    => $id,
                'name'  => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? '',
            ]);
        } catch (\Exception $e) {
            error_log("UserModel::update - " . $e->getMessage());
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
            error_log("UserModel::updateProfile - " . $e->getMessage());
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
            error_log("UserModel::updatePassword - " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (\Exception $e) {
            error_log("UserModel::delete - " . $e->getMessage());
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
            error_log("UserModel::emailExists - " . $e->getMessage());
            return false;
        }
    }

    public function setAdmin(string $name, string $email, string $password): int|false
    {
        if (empty($name) || empty($email) || empty($password)) {
            error_log("UserModel::setAdmin - Missing required fields");
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            error_log("UserModel::setAdmin - Invalid email format");
            return false;
        }

        try {
            $this->db->beginTransaction();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                $stmt = $this->db->prepare("UPDATE users SET name = :name, password = :password, role = 'admin' WHERE id = :id");
                $stmt->execute([
                    'name' => $name,
                    'password' => $hashedPassword,
                    'id' => $existingUser['id']
                ]);
                $userId = (int) $existingUser['id'];
            } else {
                $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'admin')");
                $stmt->execute([
                    'name' => $name,
                    'email' => $email,
                    'password' => $hashedPassword
                ]);
                $userId = (int) $this->db->lastInsertId();
            }

            $this->db->commit();
            return $userId;

        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("UserModel::setAdmin - " . $e->getMessage());
            return false;
        }
    }
}
