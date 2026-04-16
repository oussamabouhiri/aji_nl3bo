<?php
namespace App\Controllers;

use App\Models\GameModel;
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
    private $utility;

    public function __construct() {
        $this->gameModel = new GameModel();
        $this->reservationModel = new ReservationModel();
        $this->tableModel = new GameTableModel();
        $this->userModel = new UserModel();
        $this->utility = new Utility();
    }

    public function games() {
        $games = $this->gameModel->getAll();
        $this->utility->view("user/games", [
            'games' => $games
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
        
        $tables = $this->tableModel->getAll();
        
        $this->utility->view("user/games", [
            'game' => $game,
            'tables' => $tables
        ]);
    }

    public function reservation() {
        $games = $this->gameModel->getAll();
        $tables = $this->tableModel->getAll();
        
        $this->utility->view("user/reservation", [
            'games' => $games,
            'tables' => $tables
        ]);
    }

    public function createReservation() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/reservation');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'] ?? 1;
            
            $date = $_POST['date'] ?? null;
            $startTime = $_POST['start_time'] ?? null;
            $duration = intval($_POST['duration'] ?? 2);
            $gameId = $_POST['game_id'] ?? null;
            
            $endTime = null;
            if ($startTime) {
                $start = new \DateTime($startTime);
                $end = $start->modify("+{$duration} hours");
                $endTime = $end->format('H:i:s');
            }
            
            $price = 0;
            if ($gameId) {
                $game = $this->gameModel->getById($gameId);
                $price = $game['price'] ?? 0;
            }
            
            $data = [
                'user_id' => $userId,
                'table_id' => $_POST['table_id'] ?? null,
                'game_id' => $gameId ?: null,
                'date' => $date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'spots' => intval($_POST['spots'] ?? 0),
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

    public function logout() {
        session_destroy();
        $this->utility->redirect('/');
    }
}
