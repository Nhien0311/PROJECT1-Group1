<?php
class ProductController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        require_once 'views/products/index.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getById($id);
        require_once 'views/products/show.php';
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $thumbnail = '';
            $fileImg = "./uploads/";
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0)
            {
                $thumbnail = $fileImg . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $thumbnail);
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
                'price' => $_POST['priceModel'] ?? 0
            ];

            $this->productModel->add($data);
            header('Location: ?act=products');
        }else{
            require_once 'views/products/add.php';
        }
    }

    public function edit($id)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $thumbnail = $_POST['thumbnail'] ?? '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $thumbnail = '../uploads/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $thumbnail);
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
                'price' => $_POST['priceModel'] ?? 0
            ];

            $this->productModel->edit($id, $data);
            header('Location: ?act=products');
        }else{
            $product = $this->productModel->getById($id);
            require_once 'views/products/edit.php';
        }
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        header('Location: ?act=products');
    }
}
?>