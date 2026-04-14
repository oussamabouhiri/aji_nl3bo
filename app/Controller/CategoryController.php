<?php
namespace App\Controller;

use App\Model\CategoryModel;
use App\Helper\Utility;

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
        $category_date = [
            "name" => $_POST['name'] ?? '',
            "description" => $_POST['description'] ?? ''
        ];
        $this->categoryModel->addCategory($category_date);
        $this->utility->redirect('categories');
    }

    public function update($id) {
        $category_date = [
            "name" => $_POST['name'] ?? '',
            "description" => $_POST['description'] ?? ''
        ];
        $this->categoryModel->updateCategory($id, $category_date);
        $this->utility->redirect('categories');
    }

    public function delete($id) {
        $this->categoryModel->deleteCategory($id);
        $this->utility->redirect('categories');
    }

}