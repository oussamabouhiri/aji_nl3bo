<?php
namespace App\Controllers;

use App\Models\GameModel;
use App\Models\CategoryModel;
use App\Helper\Utility;

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
        $category = $_GET['category'] ?? null;
        $difficulty = $_GET['difficulty'] ?? null;
        $search = $_GET['search'] ?? null;
        
        if ($category || $difficulty || $search) {
            $games = $this->gameModel->filter($category, $difficulty, $search);
        } else {
            $games = $this->gameModel->getAllWithCategories();
        }
        
        $categories = $this->categoryModel->getCategories();
        $totalGames = $this->gameModel->count(true);
        
        $this->utility->view("admin/games", [
            'games' => $games,
            'categories' => $categories,
            'totalGames' => $totalGames
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'difficulty' => $_POST['difficulty'] ?? 'easy',
                'min_players' => intval($_POST['min_players'] ?? 2),
                'max_players' => intval($_POST['max_players'] ?? 4),
                'spots' => intval($_POST['spots'] ?? 4),
                'duration' => intval($_POST['duration'] ?? 60),
                'category_id' => $_POST['category_id'] ?: null,
                'price' => floatval($_POST['price'] ?? 0),
                'image_url' => $_POST['image_url'] ?? null,
                'status' => $_POST['status'] ?? 'available'
            ];
            
            $id = $this->gameModel->create($data);
            if ($id) {
                $this->utility->redirect('/admin/games');
                return;
            }
        }
        
        $this->utility->redirect('/admin/games/create');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            
            if (!$id) {
                $this->utility->redirect('/admin/games');
                return;
            }
            
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'difficulty' => $_POST['difficulty'] ?? 'easy',
                'min_players' => intval($_POST['min_players'] ?? 2),
                'max_players' => intval($_POST['max_players'] ?? 4),
                'spots' => intval($_POST['spots'] ?? 4),
                'duration' => intval($_POST['duration'] ?? 60),
                'category_id' => $_POST['category_id'] ?: null,
                'price' => floatval($_POST['price'] ?? 0),
                'image_url' => $_POST['image_url'] ?? null,
                'status' => $_POST['status'] ?? 'available'
            ];
            
            $this->gameModel->update($id, $data);
        }
        
        $this->utility->redirect('/admin/games');
    }

    public function delete($params = []) {
        $id = $params['id'] ?? $_POST['id'] ?? $_GET['id'] ?? null;
        
        if ($id) {
            $this->gameModel->delete($id);
        }
        
        $this->utility->redirect('/admin/games');
    }
}
