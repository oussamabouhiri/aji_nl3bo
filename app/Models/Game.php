<?php

namespace App\Models;

use App\Database\Database;

class Game extends Database
{
    public function getAll(): array
    {
        try {
            $stmt = $this->db->query("SELECT * FROM games");
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log("Game::getAll - " . $e->getMessage());
            return [];
        }
    }

    public function find($id): array|null
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM games WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch() ?: null;
        } catch (\Exception $e) {
            error_log("Game::find - " . $e->getMessage());
            return null;
        }
    }

    public function create(array $data): int|false
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO games (name, description, difficulty, spots, duration, status, category_id, price)
                 VALUES (:name, :description, :difficulty, :spots, :duration, :status, :category_id, :price)"
            );
            $stmt->execute($data);
            return (int) $this->db->lastInsertId();
        } catch (\Exception $e) {
            error_log("Game::create - " . $e->getMessage());
            return false;
        }
    }

    public function update($id, array $data): bool
    {
        try {
            $stmt = $this->db->prepare("UPDATE games SET name=:name, description=:description WHERE id=:id");
            return $stmt->execute(array_merge(['id'=>$id], $data));
        } catch (\Exception $e) {
            error_log("Game::update - " . $e->getMessage());
            return false;
        }
    }

    public function delete($id): bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM games WHERE id=:id");
            return $stmt->execute(['id'=>$id]);
        } catch (\Exception $e) {
            error_log("Game::delete - " . $e->getMessage());
            return false;
        }
    }
}
