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

    public function getPaginated($page = 1, $perPage = 6) {
        try {
            $offset = ($page - 1) * $perPage;

            $countSql = "SELECT COUNT(*) as total FROM game_tables";
            $countStmt = $this->db->query($countSql);
            $totalTables = $countStmt->fetch()['total'] ?? 0;

            $totalPages = max(1, ceil($totalTables / $perPage));

            $sql = "SELECT * FROM game_tables ORDER BY reference LIMIT ? OFFSET ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $perPage, \PDO::PARAM_INT);
            $stmt->bindValue(2, $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $tables = $stmt->fetchAll();

            return [
                'tables' => $tables,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'totalTables' => $totalTables,
                'perPage' => $perPage
            ];
        } catch (\Exception $e) {
            return [
                'tables' => [],
                'currentPage' => 1,
                'totalPages' => 1,
                'totalTables' => 0,
                'perPage' => $perPage
            ];
        }
    }

    public function isTableAvailable($tableId, $date, $startTime, $endTime) {
        try {
            $sql = "SELECT COUNT(*) as count FROM reservations 
                    WHERE table_id = ? 
                    AND date = ? 
                    AND status NOT IN ('cancelled', 'completed')
                    AND (
                        (start_time <= ? AND end_time > ?) 
                        OR (start_time < ? AND end_time >= ?)
                        OR (start_time >= ? AND end_time <= ?)
                    )";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$tableId, $date, $startTime, $startTime, $endTime, $endTime, $startTime, $endTime]);
            $count = (int) $stmt->fetch()['count'];
            return $count === 0;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAvailableTables($date, $startTime, $endTime) {
        try {
            $sql = "SELECT t.* FROM game_tables t
                    WHERE NOT EXISTS (
                        SELECT 1 FROM reservations r
                        WHERE r.table_id = t.id
                        AND r.date = ?
                        AND r.status NOT IN ('cancelled', 'completed')
                        AND (
                            (r.start_time <= ? AND r.end_time > ?)
                            OR (r.start_time < ? AND r.end_time >= ?)
                            OR (r.start_time >= ? AND r.end_time <= ?)
                        )
                    )
                    ORDER BY t.reference";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$date, $startTime, $startTime, $endTime, $endTime, $startTime, $endTime]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }
}
