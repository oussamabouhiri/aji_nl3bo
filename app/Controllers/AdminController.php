<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\GameTableModel;
use App\Models\SessionModel;
use App\Models\GameModel;
use App\Models\CategoryModel;
use App\Helper\Utility;

class AdminController
{
    private $reservationModel;
    private $tableModel;
    private $sessionModel;
    private $gameModel;
    private $categoryModel;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
        $this->tableModel = new GameTableModel();
        $this->sessionModel = new SessionModel();
        $this->gameModel = new GameModel();
        $this->categoryModel = new CategoryModel();
    }

    public function dashboard(): void
    {
        date_default_timezone_set('Africa/Casablanca');
        
        $today = date('Y-m-d');
        $now = date('H:i:s');
        
        // Get today's reservations
        $todayReservations = $this->reservationModel->getTodayReservations($today);
        
        // Get active sessions
        $activeSessions = $this->sessionModel->getActiveSessions();
        
        // Get all tables
        $allTables = $this->tableModel->getAll();
        
        // Calculate stats
        $totalReservationsToday = count($todayReservations);
        
        $activeSessionsCount = count($activeSessions);
        
        // Calculate available tables (tables not in active sessions)
        $occupiedTableIds = array_column($activeSessions, 'table_id');
        $availableTables = array_filter($allTables, function($table) use ($occupiedTableIds) {
            return !in_array($table['id'], $occupiedTableIds);
        });
        $availableTablesCount = count($availableTables);
        
        // Calculate revenue from today's completed sessions
        $totalRevenueToday = 0;
        foreach ($activeSessions as $session) {
            $totalRevenueToday += floatval($session['total_price'] ?? 0);
        }
        
        // Get recent completed sessions for history
        $recentSessions = $this->sessionModel->getRecentCompleted(5);
        
        // Get upcoming reservations (next 5)
        $upcomingReservations = array_slice(
            array_filter($todayReservations, function($r) use ($now) {
                return $r['start_time'] >= $now && $r['status'] !== 'cancelled';
            }), 
            0, 5
        );
        
        Utility::view('admin/dashboard', [
            'todayReservations' => $todayReservations,
            'upcomingReservations' => $upcomingReservations,
            'activeSessions' => $activeSessions,
            'recentSessions' => $recentSessions,
            'allTables' => $allTables,
            'stats' => [
                'totalReservationsToday' => $totalReservationsToday,
                'activeSessions' => $activeSessionsCount,
                'availableTables' => $availableTablesCount,
                'totalTables' => count($allTables),
                'revenueToday' => $totalRevenueToday
            ]
        ]);
    }

    public function games(): void
    {
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 12;
        $category = isset($_GET['category']) ? intval($_GET['category']) : null;
        $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : null;
        $search = isset($_GET['search']) ? trim($_GET['search']) : null;
        
        $result = $this->gameModel->getPaginated($page, $perPage, $category, $search, $difficulty, true);
        $categories = $this->categoryModel->getCategories();
        
        Utility::view('admin/games', [
            'games' => $result['games'],
            'categories' => $categories,
            'pagination' => [
                'currentPage' => $result['currentPage'],
                'totalPages' => $result['totalPages'],
                'totalGames' => $result['totalGames'],
                'perPage' => $result['perPage']
            ]
        ]);
    }

    public function reservations(): void
    {
        date_default_timezone_set('Africa/Casablanca');
        
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 15;
        $offset = ($page - 1) * $perPage;
        $filterDate = isset($_GET['date']) && !empty($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        
        $dateReservations = $this->reservationModel->getByDate($filterDate);
        $totalReservations = count($dateReservations);
        $allReservations = array_slice($dateReservations, $offset, $perPage);
        $totalReservations = count($dateReservations);
        $allReservations = array_slice($dateReservations, $offset, $perPage);
        
        $todayPaxs = array_sum(array_column($dateReservations, 'spots'));
        $confirmedCount = count(array_filter($dateReservations, fn($r) => $r['status'] === 'confirmed'));
        $pendingCount = count(array_filter($dateReservations, fn($r) => $r['status'] === 'pending'));
        
        $peakHour = '--:--';
        $peakEndTime = '--:--';
        $isFullyBooked = false;
        
        if (!empty($dateReservations)) {
            $activeReservations = array_filter($dateReservations, fn($r) => in_array($r['status'], ['confirmed', 'pending']));
            if (!empty($activeReservations)) {
                $hours = [];
                foreach ($activeReservations as $res) {
                    $hour = date('H', strtotime($res['start_time']));
                    if (!isset($hours[$hour])) {
                        $hours[$hour] = 0;
                    }
                    $hours[$hour]++;
                }
                arsort($hours);
                $peakHourKey = array_key_first($hours);
                $peakHour = date('H:i', strtotime($filterDate . ' ' . $peakHourKey . ':00'));
                $peakEndTime = date('H:i', strtotime($peakHour . '+90 minutes'));
                $isFullyBooked = reset($hours) >= 4;
            }
        }
        
        $stats = [
            'todayPaxs' => $todayPaxs,
            'confirmed' => $confirmedCount,
            'pending' => $pendingCount,
            'peakTime' => $peakHour,
            'peakEndTime' => $peakEndTime,
            'isFullyBooked' => $isFullyBooked
        ];
        
        $totalPages = ceil($totalReservations / $perPage);
        
        Utility::view('admin/reservations', [
            'reservations' => $allReservations,
            'stats' => $stats,
            'filterDate' => $filterDate,
            'pagination' => [
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'totalReservations' => $totalReservations
            ]
        ]);
    }

    public function sessions(): void
    {
        Utility::view('admin/sessions');
    }

    public function sessionHistory(): void
    {
        Utility::view('admin/session_history');
    }
}
