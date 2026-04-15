<?php


namespace App\Models;

use App\Database\Database;

class Game extends Database {

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM games");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO games (name, description, difficulty, spots, duration, status, category_id, price)
                VALUES (:name, :description, :difficulty, :spots, :duration, :status, :category_id, :price)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE games SET name=:name, description=:description WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_merge(['id'=>$id], $data));
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM games WHERE id=:id");
        $stmt->execute(['id'=>$id]);
    }
}