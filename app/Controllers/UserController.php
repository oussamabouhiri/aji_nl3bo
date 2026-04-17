<?php
namespace App\Controllers;

use App\Models\GameModel;
use App\Models\CategoryModel;
use App\Models\ReservationModel;
use App\Models\GameTableModel;
use App\Models\UserModel;
use App\Helper\Utility;
use App\Helper\Csrf;

class UserController {
    private $gameModel;
    private $reservationModel;
    private $tableModel;
    private $userModel;
    private $categoryModel;
    private $utility;

    public function __construct() {
        $this->gameModel = new GameModel();
        $this->reservationModel = new ReservationModel();
        $this->tableModel = new GameTableModel();
        $this->userModel = new UserModel();
        $this->categoryModel = new CategoryModel();
        $this->utility = new Utility();
    }

    public function games() {
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 6;
        $categoryId = isset($_GET['category']) ? intval($_GET['category']) : null;
        $search = isset($_GET['search']) ? trim($_GET['search']) : null;
        $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : null;
        $maxDuration = isset($_GET['max_duration']) ? intval($_GET['max_duration']) : null;
        $gamesResult = $this->gameModel->getPaginated($page, $perPage, $categoryId, $search, $difficulty, $maxDuration, false);

        $categories = $this->categoryModel->getCategories();
        $this->utility->view("user/games", [
            'games' => $gamesResult['games'],
            'categories' => $categories,
            'pagination' => [
                'currentPage' => $gamesResult['currentPage'],
                'totalPages' => $gamesResult['totalPages'],
                'totalGames' => $gamesResult['totalGames'],
                'perPage' => $gamesResult['perPage']
            ],
            'selectedCategory' => $categoryId,
            'search' => $search,
        ]);
    }

    // public function games() {
    //     $this->home();
    // }

    public function dashboard () {
        $this->utility->view("user/dashboard");
    }

    public function gameDetail($params = []) {
        $id = $params['id'] ?? $_GET['id'] ?? null;
        
        if (!$id) {
            $this->utility->redirect('/games');
            return;
        }
        
        $game = $this->gameModel->getById($id);
        
        if (!$game) {
            $this->utility->redirect('/games');
            return;
        }
        
        $this->utility->view("user/game-detail", [
            'game' => $game
        ]);
    }

    public function reservation() {
        $page = max(1, intval($_GET['page'] ?? 1));
        $categoryId = isset($_GET['category']) ? intval($_GET['category']) : null;
        $search = trim($_GET['search'] ?? '');
        
        $perPage = ($page === 1) ? 3 : 4;
        $result = $this->gameModel->getPaginated($page, $perPage, $categoryId, $search ?: null);
        
        $tablePage = max(1, intval($_GET['table_page'] ?? 1));
        $tableResult = $this->tableModel->getPaginated($tablePage, 6);
        
        $this->utility->view("user/reservation", [
            'games' => $result['games'],
            'tables' => $tableResult['tables'],
            'pagination' => [
                'currentPage' => $result['currentPage'],
                'totalPages' => $result['totalPages'],
                'totalGames' => $result['totalGames'],
                'perPage' => $result['perPage']
            ],
            'tablePagination' => [
                'currentPage' => $tableResult['currentPage'],
                'totalPages' => $tableResult['totalPages'],
                'totalTables' => $tableResult['totalTables'],
                'perPage' => $tableResult['perPage']
            ],
            'selectedDate' => $_GET['date'] ?? null,
            'selectedTime' => $_GET['time'] ?? null,
            'selectedDuration' => $_GET['duration'] ?? 2
        ]);
    }

    public function createReservation() {
        if (!Csrf::validate()) {
            error_log("CSRF validation failed");
            $this->utility->redirect('/reservation');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            error_log("POST data: " . print_r($_POST, true));
            
            $userId = $_SESSION['user_id'] ?? 1;
            
            $date = $_POST['date'] ?? null;
            $startTime = $_POST['start_time'] ?? null;
            $duration = intval($_POST['duration'] ?? 2);
            $gameId = $_POST['game_id'] ?? null;
            $tableId = $_POST['table_id'] ?? null;
            $spots = intval($_POST['spots'] ?? 0);
            
            error_log("Parsed: date=$date, time=$startTime, gameId=$gameId, tableId=$tableId, spots=$spots");
            
            $endTime = null;
            if ($startTime) {
                $start = new \DateTime($startTime);
                $end = $start->modify("+{$duration} hours");
                $endTime = $end->format('H:i:s');
            }
            
            $price = 0;
            if ($gameId && $gameId !== '0') {
                $game = $this->gameModel->getById($gameId);
                $price = $game['price'] ?? 0;
                error_log("Game price: $price");
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
            
            error_log("Data to insert: " . print_r($data, true));
            
            if ($data['table_id'] && $data['date'] && $data['start_time'] && $data['spots'] > 0) {
                $id = $this->reservationModel->create($data);
                error_log("Insert result: " . ($id ? "ID: $id" : "Failed"));
                if ($id) {
                    $this->utility->redirect('/my-reservations');
                    return;
                }
            } else {
                error_log("Validation failed: table_id={$data['table_id']}, date={$data['date']}, start_time={$data['start_time']}, spots={$data['spots']}");
            }
        }
        
        $this->utility->redirect('/reservation');
    }
    
    public function cancelReservation() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/my-reservations');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            
            if ($id && isset($_SESSION['user_id'])) {
                $reservation = $this->reservationModel->getById($id);
                if ($reservation && $reservation['user_id'] === $_SESSION['user_id']) {
                    $this->reservationModel->cancel($id);
                }
            }
        }
        
        $this->utility->redirect('/my-reservations');
    }

    public function myReservations() {
        $userId = $_SESSION['user_id'] ?? 1;
        
        $reservations = $this->reservationModel->getByUserId($userId);
        
        $this->utility->view("user/my_reservations", [
            'reservations' => $reservations
        ]);
    }

    public function profile() {
        $this->utility->view("user/profile");
    }

    public function login() {
        if (isset($_SESSION['user_id'])) {
            $this->utility->redirect($_SESSION['user_role'] === 'admin' ? '/admin' : '/');
            return;
        }
        
        if (!Csrf::validate()) {
            $this->utility->redirect('/login');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = $this->userModel->getByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                
                if ($user['role'] === 'admin') {
                    $this->utility->redirect('/admin');
                } else {
                    $this->utility->redirect('/');
                }
                return;
            }
            
            $error = "Invalid email or password";
            $this->utility->view("auth/login", ['error' => $error]);
            return;
        }
        
        $this->utility->view("auth/login");
    }

    public function register() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/register');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $phone = $_POST['phone'] ?? '';
            
            if ($name && $email && $password) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $id = $this->userModel->create([
                    'name' => $name,
                    'email' => $email,
                    'password' => $hashedPassword,
                    'phone' => $phone,
                    'role' => 'user'
                ]);
                
                if ($id) {
                    $this->utility->redirect('/login');
                    return;
                }
            }
            
            $error = "Registration failed";
            $this->utility->view("auth/register", ['error' => $error]);
            return;
        }
        
        $this->utility->view("auth/register");
    }

    public function getAvailable() {
        header('Content-Type: application/json');
        
        $date = $_GET['date'] ?? null;
        $time = $_GET['time'] ?? null;
        $duration = intval($_GET['duration'] ?? 2);
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 6;
        $search = isset($_GET['search']) ? trim($_GET['search']) : null;
        
        if (!$date || !$time) {
            echo json_encode(['games' => [], 'tables' => [], 'error' => 'Date and time required']);
            return;
        }
        
        $startTime = $time;
        $start = new \DateTime($time);
        $end = $start->modify("+{$duration} hours");
        $endTime = $end->format('H:i:s');
        
        $gamesResult = $this->gameModel->getAvailableGames($date, $startTime, $endTime, $page, $perPage, null, $search);
        $availableTables = $this->tableModel->getAvailableTables($date, $startTime, $endTime);
        
        echo json_encode([
            'games' => $gamesResult['games'],
            'tables' => $availableTables,
            'totalGames' => $gamesResult['totalGames'],
            'totalTables' => count($availableTables),
            'pagination' => [
                'currentPage' => $gamesResult['currentPage'],
                'totalPages' => $gamesResult['totalPages'],
                'perPage' => $gamesResult['perPage']
            ]
        ]);
    }

    public function logout() {
        session_destroy();
        $this->utility->redirect('/');
    }
}
