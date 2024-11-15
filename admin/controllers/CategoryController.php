<?php
class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $categories = $this->categoryModel->getAll();
        require_once 'views/categories/index.php';
    }

    public function show($id)
    {
        $category = $this->categoryModel->getById($id);
        require_once 'views/categories/show.php';
    }
}
?>