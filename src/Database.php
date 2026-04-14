<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    protected $db;

    public function __construct() {
        $config = require dirname(__DIR__) . '/config/database.php';

        $dsn = sprintf(
            '%s:host=%s;dbname=%s;charset=%s;port=%d',
            $config['driver'],
            $config['host'],
            $config['dbname'],
            $config['charset'],
            $config['port']
        );

        try {
            $this->db = new PDO($dsn, $config['username'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
