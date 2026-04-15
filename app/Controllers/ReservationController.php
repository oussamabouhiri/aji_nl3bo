<?php
namespace App\Controllers;

use App\Models\ReservationModel;
use App\Helper\Utility;

class ReservationController {
    private $reservationModel;
    private $utility;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
        $this->utility = new Utility();
    }

    public function index() {
        $page = $_GET['page'] ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        
        $reservations = $this->reservationModel->getAll($perPage, $offset);
        $total = $this->reservationModel->count();
        $totalPages = ceil($total / $perPage);
        
        $this->utility->view("admin/reservations", [
            'reservations' => $reservations,
            'currentPage' => (int)$page,
            'totalPages' => $totalPages,
            'totalReservations' => $total
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

    public function update() {
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

    public function confirm() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->confirm($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function cancel() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->cancel($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }

    public function restore() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
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

    public function delete() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->reservationModel->delete($id);
        }
        
        $this->utility->redirect('/admin/reservations');
    }
}
