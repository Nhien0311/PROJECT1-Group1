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
        require_once 'admin/views/categories/index.php';
    }

    public function show($id)
    {
        $category = $this->categoryModel->getById($id);
        require_once 'admin/views/categories/show.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'name' => $_POST['nameCategory']
            ];
            $this->categoryModel->add($data);
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Thêm danh mục thành công!',
                'icon' => 'success',
            ];
            header('Location: ?act=categories');
        }else{
            require_once 'admin/views/categories/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['nameCategory']
            ];
            $this->categoryModel->edit($id, $data);
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Sửa mục thành công!',
                'icon' => 'success',
            ];
            header('Location: ?act=categories');
        }else{
            $category = $this->categoryModel->getById($id);
            require_once 'admin/views/categories/edit.php';
        }
    }

    public function delete($id)
    {
        try {
            $this->categoryModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Danh mục đã được xóa!',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa danh mục: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=categories');
        exit;
    }
}
?>