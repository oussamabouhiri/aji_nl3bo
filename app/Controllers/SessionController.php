<?php
namespace App\Controllers;

use App\Models\SessionModel;
use App\Models\GameTableModel;
use App\Models\GameModel;
use App\Helper\Utility;
use App\Helper\Csrf;

class SessionController {
    private $sessionModel;
    private $tableModel;
    private $gameModel;
    private $utility;

    public function __construct() {
        $this->sessionModel = new SessionModel();
        $this->tableModel = new GameTableModel();
        $this->gameModel = new GameModel();
        $this->utility = new Utility();
    }

    public function index() {
        $activeSessions = $this->sessionModel->getActiveSessionsWithTimeRemaining();
        $todayReservations = $this->sessionModel->getTodayReservations();
        $tables = $this->tableModel->getAll();
        $availableGames = $this->gameModel->getAll();
        
        foreach ($activeSessions as &$session) {
            $session['session_games'] = $this->sessionModel->getSessionGames($session['id']);
        }
        
        $this->utility->view("admin/sessions", [
            'activeSessions' => $activeSessions,
            'todayReservations' => $todayReservations,
            'tables' => $tables,
            'availableGames' => $availableGames
        ]);
    }

    public function history() {
        $page = $_GET['page'] ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        
        $history = $this->sessionModel->getHistory($perPage, $offset);
        $total = $this->sessionModel->count();
        $totalPages = ceil($total / $perPage);
        
        foreach ($history as &$session) {
            $start = strtotime($session['start_time']);
            $end = strtotime($session['end_time']);
            $duration = $end - $start;
            $hours = floor($duration / 3600);
            $minutes = floor(($duration % 3600) / 60);
            $session['duration_formatted'] = "{$hours}h {$minutes}m";
        }
        
        $this->utility->view("admin/session_history", [
            'history' => $history,
            'currentPage' => (int)$page,
            'totalPages' => $totalPages,
            'totalSessions' => $total
        ]);
    }

    public function view($params = []) {
        $id = $params['id'] ?? $_GET['id'] ?? null;
        
        if (!$id) {
            $this->utility->abort(404);
            return;
        }
        
        $session = $this->sessionModel->getById($id);
        
        if (!$session) {
            $this->utility->abort(404);
            return;
        }
        
        $session['session_games'] = $this->sessionModel->getSessionGames($id);
        
        $this->utility->view("admin/session_view", [
            'session' => $session
        ]);
    }

    public function start($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/sessions');
            return;
        }
        
        $reservationId = $_POST['reservation_id'] ?? null;
        $gameId = $_POST['game_id'] !== '' ? $_POST['game_id'] : null;
        
        if ($reservationId) {
            $this->sessionModel->start($reservationId, $gameId);
        }
        
        $this->utility->redirect('/admin/sessions');
    }

    public function changeGame() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/sessions');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sessionId = $_POST['session_id'] ?? null;
            $newGameId = $_POST['game_id'] ?? null;
            
            if ($sessionId && $newGameId) {
                $this->sessionModel->changeGame($sessionId, $newGameId);
            }
        }
        
        $this->utility->redirect('/admin/sessions');
    }

    public function end() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/sessions');
            return;
        }
        
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $result = $this->sessionModel->end($id);
            if (!$result) {
                error_log("Failed to end session ID: $id");
            }
        }
        
        $this->utility->redirect('/admin/sessions');
    }

    public function delete() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/sessions');
            return;
        }
        
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->sessionModel->delete($id);
        }
        
        $this->utility->redirect('/admin/sessions');
    }
}
