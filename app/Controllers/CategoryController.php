<?php
namespace App\Controllers;

use App\Models\CategoryModel;
use App\Helper\Utility;
use App\Helper\Csrf;

class CategoryController {

    private $categoryModel;

    private $utility;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
        $this->utility = new Utility();
    }

    public function index() {
        $search = isset($_GET['search']) ? $_GET['search'] : false;
        if ($search) {
            $categories = $this->categoryModel->searchCategories($search);
        } else {
            $categories = $this->categoryModel->getCategories();
        }
        $data = [
            'categories' => $categories,
        ];
        $this->utility->view('admin/categories', $data);
    }

    public function create() {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        
        if (empty($name)) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $category_date = [
            "name" => $name,
            "description" => $description
        ];
        $this->categoryModel->addCategory($category_date);
        $this->utility->redirect('/admin/categories');
    }

    public function update($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? null;
        if (!$id) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        
        if (empty($name)) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $category_date = [
            "name" => $name,
            "description" => $description
        ];
        $this->categoryModel->updateCategory($id, $category_date);
        $this->utility->redirect('/admin/categories');
    }

    public function delete($params = []) {
        if (!Csrf::validate()) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        
        $id = $params['id'] ?? $_POST['id'] ?? $_GET['id'] ?? null;
        if (!$id) {
            $this->utility->redirect('/admin/categories');
            return;
        }
        $this->categoryModel->deleteCategory($id);
        $this->utility->redirect('/admin/categories');
    }

}
