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

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'name' => $_POST['nameCategory']
            ];
            $this->categoryModel->add($data);
            header('Location: ?act=categories');
        }else{
            require_once 'views/categories/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['nameCategory']
            ];
            $this->categoryModel->edit($id, $data);
            header('Location: ?act=categories');
        }else{
            $category = $this->categoryModel->getById($id);
            require_once 'views/categories/edit.php';
        }
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        header('Location: ?act=categories');
    }
}
?>