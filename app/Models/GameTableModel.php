<?php
namespace App\Models;

use App\Database\Database;

class GameTableModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM game_tables ORDER BY reference";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM game_tables WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO game_tables (capacity, reference) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$data['capacity'], $data['reference']]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE game_tables SET capacity = ?, reference = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$data['capacity'], $data['reference'], $id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM game_tables WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
