<?php
namespace App\Controllers;

use App\Models\ReservationModel;
use App\Helper\Utility;
use App\Helper\Csrf;

class ReservationController {
    private $reservationModel;
    private $utility;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
        $this->utility = new Utility();
    }

    public function createUser() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/reservation');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'] ?? null;
            $user = $_SESSION['user'] ?? null;
            
            if (!$userId || !$user) {
                $this->utility->redirect('/login');
                return;
            }
            
            $date = $_POST['date'] ?? null;
            $startTime = $_POST['start_time'] ?? null;
            $duration = intval($_POST['duration'] ?? 2);
            $gameId = $_POST['game_id'] ?? null;
            $tableId = $_POST['table_id'] ?? null;
            $spots = intval($_POST['spots'] ?? 0);
            
            $endTime = null;
            if ($startTime) {
                $start = new \DateTime($startTime);
                $end = $start->modify("+{$duration} hours");
                $endTime = $end->format('H:i:s');
            }
            
            if ($gameId && $gameId !== '0') {
                $gameModel = new \App\Models\GameModel();
                $game = $gameModel->getById($gameId);
                
                if (!$this->reservationModel->isGameAvailable($gameId, $date, $startTime, $endTime)) {
                    $_SESSION['error'] = "Sorry, the selected game is not available for the requested time slot. All copies are already reserved.";
                    $this->utility->redirect('/reservation');
                    return;
                }
                
                $price = $game['price'] ?? 0;
            } else {
                $price = 0;
            }
            
            $data = [
                'user_id' => $userId,
                'table_id' => $tableId,
                'game_id' => ($gameId && $gameId !== '0') ? $gameId : null,
                'date' => $date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'spots' => $spots,
                'price' => $price
            ];
            
            if ($data['table_id'] && $data['date'] && $data['start_time'] && $data['spots'] > 0) {
                $id = $this->reservationModel->create($data);
                if ($id) {
                    $this->utility->redirect('/my-reservations');
                    return;
                }
            }
        }
        
        $this->utility->redirect('/reservation');
    }

    public function index() {
        date_default_timezone_set('Africa/Casablanca');
        
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 15;
        $offset = ($page - 1) * $perPage;
        $filterDate = isset($_GET['date']) && !empty($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        
        $dateReservations = $this->reservationModel->getByDate($filterDate);
        
        $today = date('Y-m-d');
        $isPastDate = $filterDate < $today;
        
        if ($isPastDate) {
            foreach ($dateReservations as $res) {
                if ($res['status'] === 'confirmed') {
                    $this->reservationModel->complete($res['id']);
                }
            }
            $dateReservations = $this->reservationModel->getByDate($filterDate);
        }
        
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
            'isFullyBooked' => $isFullyBooked,
            'isPastDate' => $isPastDate
        ];
        
        $totalPages = ceil($totalReservations / $perPage);
        
        $this->utility->view("admin/reservations", [
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

    public function view($params = []) {
        $id = $params['id'] ?? $_GET['id'] ?? $_POST['id'] ?? null;
        
        if (!$id) {
            $this->utility->abort(404);
            return;
        }
        
        $reservation = $this->reservationModel->getById($id);
        
        if (!$reservation) {
            $this->utility->abort(404);
            return;
        }
        
        $this->utility->view("admin/reservation_view", [
            'reservation' => $reservation
        ]);
    }

    public function create() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'] ?? null,
                'table_id' => $_POST['table_id'] ?? null,
                'date' => $_POST['date'] ?? null,
                'start_time' => $_POST['start_time'] ?? null,
                'end_time' => $_POST['end_time'] ?? null,
                'spots' => $_POST['spots'] ?? null
            ];
            
            if ($data['user_id'] && $data['table_id'] && $data['date'] && $data['start_time'] && $data['spots']) {
                $id = $this->reservationModel->create($data);
                if ($id) {
                    $this->utility->redirect('/admin/reservations');
                    return;
                }
            }
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function quickCreate() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/sessions');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'] ?? null;
            $phone = $_POST['phone'] ?? null;
            $tableId = $_POST['table_id'] ?? null;
            $gameId = $_POST['game_id'] ?? null;
            $date = $_POST['date'] ?? date('Y-m-d');
            $startTime = $_POST['start_time'] ?? null;
            $duration = intval($_POST['duration'] ?? 60);
            
            if (!$customerName || !$phone || !$tableId || !$startTime) {
                $this->utility->redirect('/admin/sessions');
                return;
            }
            
            $userModel = new \App\Models\UserModel();
            $user = $userModel->getByPhone($phone);
            
            if (!$user) {
                $userId = $userModel->create([
                    'name' => $customerName,
                    'phone' => $phone,
                    'password' => password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT)
                ]);
            } else {
                $userId = $user['id'];
            }
            
            $gamePrice = 0;
            if ($gameId) {
                $gameModel = new \App\Models\GameModel();
                $game = $gameModel->getById($gameId);
                $gamePrice = $game['price'] ?? 0;
            }
            
            $start = new \DateTime($startTime);
            $end = $start->modify("+{$duration} minutes");
            $endTime = $end->format('H:i:s');
            
            $data = [
                'user_id' => $userId,
                'table_id' => $tableId,
                'game_id' => $gameId ?: null,
                'date' => $date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'spots' => 1,
                'price' => $gamePrice,
                'status' => 'confirmed'
            ];
            
            $id = $this->reservationModel->create($data);
        }
        
        $this->utility->redirect('/admin/sessions');
    }

    public function update() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $id = $_POST['id'] ?? null;
        
        if (!$id || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $data = [
            'date' => $_POST['date'] ?? null,
            'start_time' => $_POST['start_time'] ?? null,
            'end_time' => $_POST['end_time'] ?? null,
            'spots' => $_POST['spots'] ?? null,
            'status' => $_POST['status'] ?? null
        ];
        
        $this->reservationModel->update($id, $data);
        $this->utility->redirect('/admin/reservations/view/' . $id);
    }

    public function confirm($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->confirm($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function cancel($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->cancel($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function restore($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->restore($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function startSession($id) {
        if ($id) {
            $this->reservationModel->confirm($id);
        }
        
        $this->utility->redirect('/admin/sessions');
    }

    public function delete($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/reservations');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->delete($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }
}
