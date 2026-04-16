<?php
namespace App\Models;

use App\Database\Database;
use Exception;

class CategoryModel extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getCategories() {
        try {
            $sql = "SELECT c.*, COUNT(g.id) AS count 
                    FROM categories c 
                    LEFT JOIN games g ON c.id = g.category_id 
                    GROUP BY c.id
                    ORDER BY c.created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("CategoryModel::getCategories - " . $e->getMessage());
            return [];
        }
    }

    public function getCategoryById($id) {
        try {
            $sql = "SELECT c.*, COUNT(g.id) AS count 
                    FROM categories c 
                    LEFT JOIN games g ON c.id = g.category_id 
                    WHERE c.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();

        } catch (Exception $e) {
            error_log("CategoryModel::getCategoryById - " . $e->getMessage());
            return null;
        }   
    }

    public function addCategory($categoryData) {
        try {
            $sql = "INSERT INTO categories (name, description) VALUES (:name, :description)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute($categoryData);
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            error_log("CategoryModel::addCategory - " . $e->getMessage());
            return false;
        }

    }

    public function updateCategory($id, $categoryData) {
        try {
            $sql = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array_merge(['id' => $id], $categoryData));
            return $stmt->rowCount();
        } catch (Exception $e) {
            error_log("CategoryModel::updateCategory - " . $e->getMessage());
            return false;
        }
    }

    public function deleteCategory($id) {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->rowCount();
        } catch (Exception $e) {
            error_log("CategoryModel::deleteCategory - " . $e->getMessage());
            return false;
        }
    }

    public function searchCategories($search) {
        try {
            $sql = "SELECT c.*, COUNT(g.id) AS count 
                    FROM categories c 
                    LEFT JOIN games g ON c.id = g.category_id 
                    WHERE c.name LIKE :search
                    GROUP BY c.id
                    ORDER BY c.created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['search' => "%$search%"]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("CategoryModel::searchCategories - " . $e->getMessage());
            return [];
        }
    }


}