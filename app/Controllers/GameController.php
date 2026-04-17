<?php
namespace App\Controllers;

use App\Models\GameModel;
use App\Models\CategoryModel;
use App\Helper\Utility;
use App\Helper\Csrf;

class GameController {
    private $gameModel;
    private $categoryModel;
    private $utility;

    public function __construct() {
        $this->gameModel = new GameModel();
        $this->categoryModel = new CategoryModel();
        $this->utility = new Utility();
    }

    public function index() {
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 6;
        $category = $_GET['category'] ?? null;
        $difficulty = $_GET['difficulty'] ?? null;
        $search = $_GET['search'] ?? null;
        
        $result = $this->gameModel->getPaginated($page, $perPage, $category, $search, $difficulty, null, true);
        
        $categories = $this->categoryModel->getCategories();
        
        $this->utility->view("admin/games", [
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

    public function create() {
        $categories = $this->categoryModel->getCategories();
        $this->utility->view("admin/game_form", [
            'categories' => $categories,
            'action' => 'create'
        ]);
    }

    public function edit($params = []) {
        $id = $params['id'] ?? $_GET['id'] ?? null;
        
        if (!$id) {
            $this->utility->redirect('/admin/games');
            return;
        }
        
        $game = $this->gameModel->getById($id);
        
        if (!$game) {
            $this->utility->redirect('/admin/games');
            return;
        }
        
        $categories = $this->categoryModel->getCategories();
        
        $this->utility->view("admin/game_form", [
            'game' => $game,
            'categories' => $categories,
            'action' => 'edit'
        ]);
    }

    public function store() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/games');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $minPlayers = intval($_POST['min_players'] ?? 2);
            $maxPlayers = intval($_POST['max_players'] ?? 4);
            
            if ($minPlayers > $maxPlayers) {
                $this->utility->redirect('/admin/games/create');
                return;
            }
            
            $data = [
                'name' => trim($_POST['name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'difficulty' => $_POST['difficulty'] ?? 'easy',
                'min_players' => $minPlayers,
                'max_players' => $maxPlayers,
                'spots' => intval($_POST['spots'] ?? 4),
                'duration' => intval($_POST['duration'] ?? 60),
                'category_id' => $_POST['category_id'] ?: null,
                'price' => floatval($_POST['price'] ?? 0),
                'image_url' => $_POST['image_url'] ?: null,
                'status' => $_POST['status'] ?? 'available'
            ];
            
            if (empty($data['name'])) {
                $this->utility->redirect('/admin/games/create');
                return;
            }
            
            $id = $this->gameModel->create($data);
            if ($id) {
                $this->utility->redirect('/admin/games');
                return;
            }
        }
        
        $this->utility->redirect('/admin/games/create');
    }

    public function update() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/games');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            
            if (!$id) {
                $this->utility->redirect('/admin/games');
                return;
            }
            
            $minPlayers = intval($_POST['min_players'] ?? 2);
            $maxPlayers = intval($_POST['max_players'] ?? 4);
            
            if ($minPlayers > $maxPlayers) {
                $this->utility->redirect('/admin/games/edit/' . $id);
                return;
            }
            
            $data = [
                'name' => trim($_POST['name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'difficulty' => $_POST['difficulty'] ?? 'easy',
                'min_players' => $minPlayers,
                'max_players' => $maxPlayers,
                'spots' => intval($_POST['spots'] ?? 4),
                'duration' => intval($_POST['duration'] ?? 60),
                'category_id' => $_POST['category_id'] ?: null,
                'price' => floatval($_POST['price'] ?? 0),
                'image_url' => $_POST['image_url'] ?: null,
                'status' => $_POST['status'] ?? 'available'
            ];
            
            if (empty($data['name'])) {
                $this->utility->redirect('/admin/games/edit/' . $id);
                return;
            }
            
            $this->gameModel->update($id, $data);
        }
        
        $this->utility->redirect('/admin/games');
    }

    public function delete($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/games');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->gameModel->delete($id);
        }
        
        $this->utility->redirect('/admin/games');
    }
}
