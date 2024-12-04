<?php
class ProductController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        require_once 'admin/views/products/index.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getById($id);
        require_once 'admin/views/products/show.php';
    }

    public function add()
    {
        try {
            // Khởi tạo mảng lỗi
            $_SESSION['errors'] = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $thumbnail = '';
                $fileImg = "uploads/";
                if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                    $thumbnail = $fileImg . basename($_FILES['thumbnail']['name']);
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail);
                }

                $data = [
                    'name' => $_POST['nameModel'],
                    'category_id' => $_POST['categoryModel'] ?? '',
                    'thumbnail' => $thumbnail,
                    'short_description' => $_POST['descriptionModel'] ?? '',
                    'content' => $_POST['contentModel'] ?? '',
                    'status' => $_POST['statusModel'] ?? '',
                    'views' => $_POST['viewsModel'] ?? '',
                    'sale_price' => $_POST['sale_priceModel'] ?? 0,
                    'price' => $_POST['priceModel'] ?? 0,
                    'quantity' => $_POST['quantity'] ?? 0
                ];

                if (empty($data['statusModel'])) {
                    $_SESSION['errors']['statusModel'] = "Trạng thái không được để trống";
                };
                if (empty($data['status']))
                    // Nếu có lỗi, quay lại trang tạo sản phẩm -> hiển thị lỗi
                    if (!empty($_SESSION['errors'])) {
                        require_once "admin/views/products/add.php";
                        return;
                    }

                $this->productModel->add($data);
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Sản phẩm đã được thêm thành công.',
                    'icon' => 'success',
                ];
                header("Location:?act=products");
            } else {
                $categories = $this->categoryModel->getAll();
                require_once 'admin/views/products/add.php';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
            header("Location:?act=products");
        };
    }

    public function edit($id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $thumbnail = $_POST['thumbnail'] ?? '';
                if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                    $thumbnail = './uploads/' . basename($_FILES['thumbnail']['name']);
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail);
                }

                $data = [
                    'name' => $_POST['nameModel'] ?? '',
                    'category_id' => $_POST['categoryModel'] ?? '',
                    'thumbnail' => $thumbnail,
                    'short_description' => $_POST['descriptionModel'] ?? '',
                    'content' => $_POST['contentModel'] ?? '',
                    'status' => $_POST['statusModel'] ?? '',
                    'views' => $_POST['viewsModel'] ?? '',
                    'sale_price' => $_POST['sale_priceModel'] ?? 0,
                    'price' => $_POST['priceModel'] ?? 0,
                    'quantity' => $_POST['quantity'] ?? 0
                ];

                $this->productModel->edit($id, $data);
                $_SESSION['message'] = [
                    'title' => 'Thành công!',
                    'text' => 'Sản phẩm đã được cập nhật!',
                    'icon' => 'success',
                ];
                header('Location: ?act=products');
            } else {
                $product = $this->productModel->getById($id);
                $categories = $this->categoryModel->getAll();
                require_once 'admin/views/products/edit.php';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Có lỗi xảy ra khi cập nhật sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
            header("Location: ?act=products");
        }
    }

    public function delete($id)
    {
        try {
            $this->productModel->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Sản phẩm đã được xóa!',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa sản phẩm: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location: ?act=products');
        exit;
    }
}
