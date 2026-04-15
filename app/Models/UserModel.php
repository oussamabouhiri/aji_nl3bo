<?php
namespace App\Models;

use App\Database\Database;

class UserModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM users ORDER BY created_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getByEmail($email) {
        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['name'],
                $data['email'],
                $data['password'],
                $data['phone'] ?? '',
                $data['role'] ?? 'user'
            ]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $data['name'],
                $data['email'],
                $data['phone'] ?? '',
                $id
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
