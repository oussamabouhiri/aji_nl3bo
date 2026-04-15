<?php
namespace App\Controllers;

use App\Models\Game;
use App\Helper\Utility;

class GameController {

    private $game;

    public function __construct() {
        $this->game = new Game();
    }

    // LIST
    public function index() {
        $games = $this->game->getAll();
        Utility::view('admin/games/index', compact('games'));
    }

    // FORM CREATE
    public function createForm() {
        Utility::view('admin/games/create');
    }

    // STORE
    public function store() {

        // ✅ Validation
        if (empty($_POST['name'])) {
            $_SESSION['error'] = "Nom obligatoire";
            Utility::redirect('/games/create');
        }

        // ✅ Sécurisation
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'] ?? '',
            'difficulty' => $_POST['difficulty'] ?? 'easy',
            'spots' => (int)$_POST['spots'],
            'duration' => (int)$_POST['duration'],
            'status' => $_POST['status'] ?? 'available',
            'category_id' => (int)$_POST['category_id'],
            'price' => (float)$_POST['price']
        ];

        $this->game->create($data);

        $_SESSION['success'] = "Jeu ajouté avec succès";
        Utility::redirect('/games');
    }

    // EDIT
    public function edit($id) {
        $game = $this->game->find($id);
        Utility::view('admin/games/edit', compact('game'));
    }

    // UPDATE
    public function update($id) {

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
        ];

        $this->game->update($id, $data);

        $_SESSION['success'] = "Jeu modifié";
        Utility::redirect('/games');
    }

    // DELETE
    public function delete($id) {
        $this->game->delete($id);

        $_SESSION['success'] = "Jeu supprimé";
        Utility::redirect('/games');
    }
}