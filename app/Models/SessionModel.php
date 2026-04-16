<?php
namespace App\Models;

use App\Database\Database;

class SessionModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll($limit = null, $offset = 0) {
        try {
            $sql = "SELECT s.*, r.date, r.start_time, r.end_time, r.status as reservation_status, r.price as total_price,
                    u.name as customer_name, u.phone,
                    g.name as game_name, g.image_url as game_image,
                    t.reference as table_reference, t.capacity as table_capacity
                    FROM sessions s
                    LEFT JOIN reservations r ON s.reservation_id = r.id
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON s.game_id = g.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    ORDER BY s.created_at DESC";
            
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

    public function getActiveSessions() {
        try {
            $sql = "SELECT s.*, r.date, r.start_time, r.end_time, r.status as reservation_status, r.price as total_price,
                    u.name as customer_name, u.phone,
                    g.name as game_name, g.image_url as game_image,
                    t.reference as table_reference, t.capacity as table_capacity
                    FROM sessions s
                    LEFT JOIN reservations r ON s.reservation_id = r.id
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON s.game_id = g.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    WHERE s.status = 'active'
                    ORDER BY s.started_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getHistory($limit = null, $offset = 0) {
        try {
            $sql = "SELECT s.*, r.date as session_date, r.start_time, r.end_time, r.price as total_price,
                    u.name as customer_name,
                    g.name as game_name, g.min_players, g.max_players,
                    t.reference as table_reference, t.id as table_number,
                    cat.name as category, cat.id as category_id
                    FROM sessions s
                    LEFT JOIN reservations r ON s.reservation_id = r.id
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON s.game_id = g.id
                    LEFT JOIN categories cat ON g.category_id = cat.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    WHERE s.status = 'ended'
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
            $sql = "SELECT s.*, r.date, r.start_time, r.end_time, r.status as reservation_status, r.price as total_price,
                    u.name as customer_name, u.phone,
                    g.name as game_name, g.image_url as game_image,
                    t.reference as table_reference, t.capacity as table_capacity
                    FROM sessions s
                    LEFT JOIN reservations r ON s.reservation_id = r.id
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON s.game_id = g.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    WHERE s.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function count() {
        try {
            $sql = "SELECT COUNT(*) as total FROM sessions WHERE status = 'ended'";
            $stmt = $this->db->query($sql);
            return $stmt->fetch()['total'] ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function countActive() {
        try {
            $sql = "SELECT COUNT(*) as total FROM sessions WHERE status = 'active'";
            $stmt = $this->db->query($sql);
            return $stmt->fetch()['total'] ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getTodayReservations() {
        try {
            $today = date('Y-m-d');
            $sql = "SELECT r.*, 
                    u.name as customer_name, u.phone,
                    g.name as game_name, g.image_url as game_image, g.price as game_price,
                    t.id as table_id, t.reference as table_reference, t.capacity as table_capacity,
                    TIMESTAMPDIFF(MINUTE, r.start_time, r.end_time) as planned_duration,
                    TIMESTAMPDIFF(MINUTE, NOW(), r.start_time) as minutes_until_start
                    FROM reservations r
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON r.game_id = g.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    WHERE r.date = ? AND r.status = 'confirmed'
                    ORDER BY r.start_time ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$today]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getActiveSessionsWithTimeRemaining() {
        try {
            $sql = "SELECT s.*, 
                    r.date, r.start_time, r.end_time, r.status as reservation_status, r.price as total_price,
                    u.name as customer_name, u.phone,
                    g.name as game_name, g.image_url as game_image,
                    t.id as table_id, t.reference as table_reference, t.capacity as table_capacity,
                    TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(s.started_at, INTERVAL s.duration MINUTE)) as seconds_remaining,
                    s.started_at as session_started_at
                    FROM sessions s
                    LEFT JOIN reservations r ON s.reservation_id = r.id
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN games g ON s.game_id = g.id
                    LEFT JOIN game_tables t ON r.table_id = t.id
                    WHERE s.status = 'active'
                    ORDER BY s.started_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO sessions (reservation_id, game_id, duration, status, started_at) 
                    VALUES (?, ?, ?, 'active', NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['reservation_id'],
                $data['game_id'],
                $data['duration'] ?? 0
            ]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function start($reservationId, $gameId, $duration = 0) {
        if (empty($gameId)) {
            $gameId = null;
        }
        
        try {
            $this->db->beginTransaction();
            
            $sql = "SELECT r.*, 
                    TIMESTAMPDIFF(MINUTE, r.start_time, r.end_time) as planned_duration,
                    TIMESTAMPDIFF(MINUTE, r.start_time, NOW()) as minutes_late,
                    g.price as game_price
                    FROM reservations r
                    LEFT JOIN games g ON r.game_id = g.id
                    WHERE r.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$reservationId]);
            $reservation = $stmt->fetch();
            
            if ($gameId === null && !empty($reservation['game_id'])) {
                $gameId = $reservation['game_id'];
            }
            
            $plannedDuration = $reservation['planned_duration'] ?? 60;
            $minutesLate = max(0, $reservation['minutes_late'] ?? 0);
            $actualDuration = max(15, $plannedDuration - $minutesLate);
            
            $initialPrice = $reservation['price'] ?? 0;
            $validGameId = null;
            
            if ($gameId) {
                $stmt = $this->db->prepare("SELECT id, price FROM games WHERE id = ?");
                $stmt->execute([$gameId]);
                $game = $stmt->fetch();
                
                if ($game) {
                    $validGameId = $gameId;
                    $initialPrice = $game['price'] ?? 0;
                    
                    $sql = "UPDATE games SET status = 'unavailable' WHERE id = ?";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([$gameId]);
                }
            }
            
            $sql = "INSERT INTO sessions (reservation_id, game_id, duration, status, started_at) 
                    VALUES (?, ?, ?, 'active', NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$reservationId, $validGameId, $actualDuration]);
            $sessionId = $this->db->lastInsertId();
            
            if ($validGameId) {
                $sql = "INSERT INTO session_games (session_id, game_id, price_at_time, is_active) VALUES (?, ?, ?, TRUE)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$sessionId, $validGameId, $initialPrice]);
            }
            
            $sql = "UPDATE reservations SET status = 'in_progress', price = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$initialPrice, $reservationId]);
            
            $this->db->commit();
            
            return $sessionId;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Session start error: " . $e->getMessage());
            return false;
        }
    }

    public function changeGame($sessionId, $newGameId) {
        try {
            $this->db->beginTransaction();
            
            $stmt = $this->db->prepare("SELECT game_id FROM sessions WHERE id = ?");
            $stmt->execute([$sessionId]);
            $session = $stmt->fetch();
            $oldGameId = $session['game_id'] ?? null;
            
            $stmt = $this->db->prepare("SELECT id FROM session_games WHERE session_id = ? AND is_active = TRUE");
            $stmt->execute([$sessionId]);
            $currentSessionGame = $stmt->fetch();
            
            if ($currentSessionGame) {
                $sql = "UPDATE session_games SET is_active = FALSE, returned_at = NOW() WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$currentSessionGame['id']]);
            }
            
            if ($oldGameId) {
                $sql = "UPDATE games SET status = 'available' WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$oldGameId]);
            }
            
            $stmt = $this->db->prepare("SELECT price FROM games WHERE id = ?");
            $stmt->execute([$newGameId]);
            $game = $stmt->fetch();
            $gamePrice = $game['price'] ?? 0;
            
            $sql = "UPDATE games SET status = 'unavailable' WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$newGameId]);
            
            $sql = "UPDATE sessions SET game_id = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$newGameId, $sessionId]);
            
            $sql = "INSERT INTO session_games (session_id, game_id, price_at_time, is_active) VALUES (?, ?, ?, TRUE)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$sessionId, $newGameId, $gamePrice]);
            
            $sql = "UPDATE reservations SET price = price + ? WHERE id = (SELECT reservation_id FROM sessions WHERE id = ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$gamePrice, $sessionId]);
            
            $this->db->commit();
            
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Change game error: " . $e->getMessage());
            return false;
        }
    }

    public function getSessionGames($sessionId) {
        try {
            $sql = "SELECT sg.*, g.name as game_name, g.image_url as game_image
                    FROM session_games sg
                    LEFT JOIN games g ON sg.game_id = g.id
                    WHERE sg.session_id = ?
                    ORDER BY sg.added_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$sessionId]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getCurrentGame($sessionId) {
        try {
            $sql = "SELECT sg.*, g.name as game_name, g.image_url as game_image, g.price
                    FROM session_games sg
                    LEFT JOIN games g ON sg.game_id = g.id
                    WHERE sg.session_id = ? AND sg.is_active = TRUE
                    LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$sessionId]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function end($id) {
        try {
            $this->db->beginTransaction();
            
            $session = $this->getById($id);
            
            $sql = "UPDATE sessions SET status = 'ended', ended_at = NOW() WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            
            if ($session && $session['reservation_id']) {
                $sql = "UPDATE reservations SET status = 'completed' WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$session['reservation_id']]);
            }
            
            if ($session && $session['game_id']) {
                $sql = "UPDATE games SET status = 'available' WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$session['game_id']]);
            }
            
            $sql = "UPDATE session_games SET is_active = FALSE, returned_at = NOW() WHERE session_id = ? AND is_active = TRUE";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            
            $this->db->commit();
            
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Session end error: " . $e->getMessage());
            return false;
        }
    }

    private function updateReservationStatus($reservationId, $status) {
        try {
            $sql = "UPDATE reservations SET status = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$status, $reservationId]);
            return true;
        } catch (\Exception $e) {
            error_log("SessionModel::updateReservationStatus - " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM sessions WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getAvailableGamesForTime($date, $startTime, $endTime, $excludeReservationId = null) {
        try {
            $params = [$date, $startTime, $startTime, $endTime, $endTime, $startTime, $endTime];
            $excludeClause = "";
            
            if ($excludeReservationId) {
                $excludeClause = " AND r2.id != ?";
                $params[] = $excludeReservationId;
            }
            
            $sql = "SELECT g.* FROM games g 
                    WHERE g.id NOT IN (
                        SELECT DISTINCT r2.game_id 
                        FROM reservations r2 
                        WHERE r2.date = ? 
                        AND r2.game_id IS NOT NULL
                        AND r2.status IN ('confirmed', 'in_progress')
                        {$excludeClause}
                        AND (
                            (r2.start_time <= ? AND r2.end_time > ?)
                            OR (r2.start_time < ? AND r2.end_time >= ?)
                            OR (r2.start_time >= ? AND r2.end_time <= ?)
                        )
                    )
                    ORDER BY g.name";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log("Error getting available games: " . $e->getMessage());
            return [];
        }
    }
}
