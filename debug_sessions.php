<?php
$pdo = new PDO('mysql:host=localhost;dbname=games_db', 'root', '');

echo "=== Tables ===\n";
$stmt = $pdo->query("SELECT * FROM game_tables");
foreach ($stmt->fetchAll() as $row) {
    echo "ID: {$row['id']}, Ref: {$row['reference']}, Capacity: {$row['capacity']}\n";
}

echo "\n=== Today's Reservations ===\n";
$today = date('Y-m-d');
$stmt = $pdo->prepare("SELECT r.*, g.name as game_name, u.name as customer_name 
    FROM reservations r 
    LEFT JOIN games g ON r.game_id = g.id 
    LEFT JOIN users u ON r.user_id = u.id 
    WHERE r.date = ?");
$stmt->execute([$today]);
$reservations = $stmt->fetchAll();
echo "Found: " . count($reservations) . " reservations\n";
foreach ($reservations as $row) {
    echo "Table {$row['table_id']}: {$row['start_time']} - Status: {$row['status']}\n";
}

echo "\n=== Active Sessions ===\n";
$stmt = $pdo->query("SELECT s.*, r.table_id, g.name as game_name FROM sessions s 
    LEFT JOIN reservations r ON s.reservation_id = r.id 
    LEFT JOIN games g ON s.game_id = g.id 
    WHERE s.status = 'active'");
$sessions = $stmt->fetchAll();
echo "Found: " . count($sessions) . " active sessions\n";
foreach ($sessions as $row) {
    echo "Session {$row['id']}: Table {$row['table_id']} - {$row['game_name']}\n";
}
