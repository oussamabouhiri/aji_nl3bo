<?php
namespace App\Models;

use App\Database\Database;

class GameModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll($limit = null, $includeUnavailable = false) {
        try {
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id";
            
            if (!$includeUnavailable) {
                $sql .= " WHERE g.status = 'available'";
            }
            
            $sql .= " ORDER BY g.name ASC";
            
            if ($limit) {
                $sql .= " LIMIT $limit";
            }
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getPaginated(int $page = 1, int $perPage = 12, ?int $categoryId = null, ?string $search = null): array
    {
        try {
            $offset = ($page - 1) * $perPage;
            $params = [];
            $whereClause = "WHERE g.status = 'available'";
            
            if ($categoryId) {
                $whereClause .= " AND g.category_id = :category_id";
                $params['category_id'] = $categoryId;
            }
            
            if ($search) {
                $whereClause .= " AND g.name LIKE :search";
                $params['search'] = "%$search%";
            }
            
            $countSql = "SELECT COUNT(*) FROM games g $whereClause";
            $stmt = $this->db->prepare($countSql);
            $stmt->execute($params);
            $totalGames = (int) $stmt->fetchColumn();
            
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id
                    $whereClause
                    ORDER BY g.name ASC
                    LIMIT :limit OFFSET :offset";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            
            if ($categoryId) {
                $stmt->bindValue(':category_id', $categoryId, \PDO::PARAM_INT);
            }
            if ($search) {
                $stmt->bindValue(':search', "%$search%");
            }
            
            $stmt->execute();
            $games = $stmt->fetchAll();
            
            $totalPages = (int) ceil($totalGames / $perPage);
            
            return [
                'games' => $games,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'totalGames' => $totalGames,
                'perPage' => $perPage
            ];
        } catch (\Exception $e) {
            error_log("GameModel::getPaginated - " . $e->getMessage());
            return [
                'games' => [],
                'currentPage' => 1,
                'totalPages' => 0,
                'totalGames' => 0,
                'perPage' => $perPage
            ];
        }
    }

    public function getAllWithCategories($limit = null) {
        try {
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id
                    ORDER BY g.name ASC";
            
            if ($limit) {
                $sql .= " LIMIT $limit";
            }
            
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function filter($categoryId = null, $difficulty = null, $search = null) {
        try {
            $conditions = [];
            $params = [];
            
            if ($categoryId) {
                $conditions[] = "g.category_id = ?";
                $params[] = $categoryId;
            }
            
            if ($difficulty) {
                $conditions[] = "g.difficulty = ?";
                $params[] = $difficulty;
            }
            
            if ($search) {
                $conditions[] = "g.name LIKE ?";
                $params[] = "%$search%";
            }
            
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id";
            
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }
            
            $sql .= " ORDER BY g.name ASC";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id 
                    WHERE g.id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getByCategory($categoryId) {
        try {
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id 
                    WHERE g.category_id = ? AND g.status = 'available'
                    ORDER BY g.name ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$categoryId]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function search($query) {
        try {
            $sql = "SELECT g.*, c.name as category_name 
                    FROM games g 
                    LEFT JOIN categories c ON g.category_id = c.id 
                    WHERE g.name LIKE ? AND g.status = 'available'
                    ORDER BY g.name ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['%' . $query . '%']);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO games (name, description, difficulty, min_players, max_players, spots, duration, category_id, price, image_url, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['name'],
                $data['description'],
                $data['difficulty'],
                $data['min_players'] ?? 2,
                $data['max_players'] ?? 4,
                $data['spots'],
                $data['duration'],
                $data['category_id'] ?? null,
                $data['price'],
                $data['image_url'] ?? null,
                $data['status'] ?? 'available'
            ]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE games SET name = ?, description = ?, difficulty = ?, min_players = ?, max_players = ?, spots = ?, duration = ?, category_id = ?, price = ?, image_url = ?, status = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $data['name'],
                $data['description'],
                $data['difficulty'],
                $data['min_players'] ?? 2,
                $data['max_players'] ?? 4,
                $data['spots'],
                $data['duration'],
                $data['category_id'] ?? null,
                $data['price'],
                $data['image_url'] ?? null,
                $data['status'] ?? 'available',
                $id
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM games WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function count($includeUnavailable = false) {
        try {
            $sql = "SELECT COUNT(*) as total FROM games";
            if (!$includeUnavailable) {
                $sql .= " WHERE status = 'available'";
            }
            $stmt = $this->db->query($sql);
            return $stmt->fetch()['total'] ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
