<?php
namespace App\Models;

use App\Database\Database;

class ReservationModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll($limit = null, $offset = 0) {
        try {
            $sql = "SELECT r.*, u.name as customer_name, u.email, u.phone,
                    t.reference as table_reference, t.capacity as table_capacity,
                    g.name as game_name, g.image_url as game_image, g.price as game_price
                    FROM reservations r
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    LEFT JOIN games g ON r.game_id = g.id
                    ORDER BY r.date DESC, r.start_time DESC";
            
            if ($limit) {
                $sql .= " LIMIT $limit OFFSET $offset";
            }
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT r.*, u.name as customer_name, u.email, u.phone,
                    t.reference as table_reference, t.capacity as table_capacity,
                    g.name as game_name, g.image_url as game_image, g.price as game_price
                    FROM reservations r
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    LEFT JOIN games g ON r.game_id = g.id
                    WHERE r.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getByUserId($userId) {
        try {
            $sql = "SELECT r.*, t.reference as table_reference, t.capacity as table_capacity,
                    g.name as game_name, g.image_url as game_image, g.price as game_price
                    FROM reservations r
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    LEFT JOIN games g ON r.game_id = g.id
                    WHERE r.user_id = ?
                    ORDER BY r.date DESC, r.start_time DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getTodayReservations() {
        try {
            $today = date('Y-m-d');
            $sql = "SELECT r.*, u.name as customer_name, u.phone,
                    t.reference as table_reference, t.capacity as table_capacity,
                    g.name as game_name, g.image_url as game_image, g.price as game_price
                    FROM reservations r
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    LEFT JOIN games g ON r.game_id = g.id
                    WHERE r.date = ?
                    ORDER BY r.start_time ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$today]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function count() {
        try {
            $sql = "SELECT COUNT(*) as total FROM reservations";
            $stmt = $this->db->query($sql);
            return $stmt->fetch()['total'] ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function create($data) {
        try {
            error_log("Executing INSERT query");
            $sql = "INSERT INTO reservations (user_id, table_id, game_id, date, start_time, end_time, spots, status, price) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', ?)";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                $data['user_id'],
                $data['table_id'],
                $data['game_id'] ?? null,
                $data['date'],
                $data['start_time'],
                $data['end_time'],
                $data['spots'],
                $data['price'] ?? 0
            ]);
            error_log("Query executed, result: " . ($result ? "success" : "failed"));
            $id = $this->db->lastInsertId();
            error_log("Last insert ID: " . $id);
            return $id;
        } catch (\Exception $e) {
            error_log("Exception in create: " . $e->getMessage());
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE reservations SET 
                    date = ?, start_time = ?, end_time = ?, spots = ?, status = ?
                    WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $data['date'],
                $data['start_time'],
                $data['end_time'],
                $data['spots'],
                $data['status'],
                $id
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function confirm($id) {
        return $this->updateStatus($id, 'confirmed');
    }

    public function cancel($id) {
        return $this->updateStatus($id, 'cancelled');
    }

    public function restore($id) {
        return $this->updateStatus($id, 'pending');
    }

    public function complete($id) {
        return $this->updateStatus($id, 'completed');
    }

    public function updatePrice($id, $price) {
        try {
            $sql = "UPDATE reservations SET price = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$price, $id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    private function updateStatus($id, $status) {
        try {
            $sql = "UPDATE reservations SET status = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$status, $id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM reservations WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getActiveReservationsForGame($gameId, $date, $startTime, $endTime) {
        try {
            $sql = "SELECT COUNT(*) as count FROM reservations 
                    WHERE game_id = ? 
                    AND date = ? 
                    AND status NOT IN ('cancelled', 'completed')
                    AND (
                        (start_time <= ? AND end_time > ?) 
                        OR (start_time < ? AND end_time >= ?)
                        OR (start_time >= ? AND end_time <= ?)
                    )";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$gameId, $date, $startTime, $startTime, $endTime, $endTime, $startTime, $endTime]);
            return (int) $stmt->fetch()['count'];
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function isGameAvailable($gameId, $date, $startTime, $endTime) {
        try {
            $sql = "SELECT g.spots FROM games g WHERE g.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$gameId]);
            $game = $stmt->fetch();
            
            if (!$game) {
                return false;
            }
            
            $totalSpots = (int) $game['spots'];
            $reservedSpots = $this->getActiveReservationsForGame($gameId, $date, $startTime, $endTime);
            
            return $reservedSpots < $totalSpots;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAvailableSpots($gameId, $date, $startTime, $endTime) {
        try {
            $sql = "SELECT g.spots FROM games g WHERE g.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$gameId]);
            $game = $stmt->fetch();
            
            if (!$game) {
                return 0;
            }
            
            $totalSpots = (int) $game['spots'];
            $reservedSpots = $this->getActiveReservationsForGame($gameId, $date, $startTime, $endTime);
            
            return max(0, $totalSpots - $reservedSpots);
        } catch (\Exception $e) {
            return 0;
        }
    }
}
