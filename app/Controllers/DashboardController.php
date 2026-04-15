<?php 

namespace App\Controllers;

use App\Database\Database;
use App\Helper\Utility;

class DashboardController extends Database {

    public function index() {

        // Total jeux
        $games = $this->db->query("
            SELECT COUNT(*) as total FROM games
        ")->fetch();

        // Réservations aujourd’hui
        $reservations = $this->db->query("
            SELECT COUNT(*) as total 
            FROM reservation 
            WHERE date = CURDATE()
        ")->fetch();

        // Sessions actives
        $sessions = $this->db->query("
            SELECT COUNT(*) as total 
            FROM sessions 
            WHERE status = 'enrolling'
        ")->fetch();

        // Top jeux (bonus 💥)
        $topGames = $this->db->query("
            SELECT g.name, COUNT(sg.game_id) as total
            FROM session_games sg
            JOIN games g ON g.id = sg.game_id
            GROUP BY g.id
            ORDER BY total DESC
            LIMIT 5
        ")->fetchAll();

        Utility::view('admin/dashboard', [
            'games' => $games,
            'reservations' => $reservations,
            'sessions' => $sessions,
            'topGames' => $topGames
        ]);
    }
}