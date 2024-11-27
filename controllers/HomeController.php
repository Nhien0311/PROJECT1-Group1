<?php
class HomeController
{
    private $product;
    private $category;
    public function __construct() {
        $this->product = new Product();
        $this->category = new Category();
    }
    public function index(){
        $products = $this->product->getAll();
        $categories = $this->category->getAll();
        require_once './views/home.php';
        require_once 'views/single-product/single-product.php';
    }
    public function show($id)
    {
        $product = $this->product->getById($id);
        require_once './views/single-product/single-product.php';
    }
};
?>