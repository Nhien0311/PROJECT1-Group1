<?php
class HomeController
{
    private $productModel;
    private $product;
    private $category;
    public function __construct() {
        $this->product = new Product();
        $this->category = new Category();
        $this->productModel = new Products();
    }
    public function index(){
        $products = $this->product->getTop_8();
        $categories = $this->category->getAll();
        require_once './views/home.php';
    }
    public function show($id)
    {
        $product = $this->product->getById($id);
        require_once './views/single-product/single-product.php';
    }
    public function productByCategory()
    {
        $categories = $this->productModel->category();
        $categoryId = $_GET['categoryId'] ?? null;

        if($categoryId){
            $products = $this->productModel->getProductsByCategory($categoryId);
        }else{
            $products = $this->productModel->getAll();
        }
        require_once 'views/products.php';
    }
};
?>