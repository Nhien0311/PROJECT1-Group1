<?php
class HomeController
{
    private $product;
    public function __construct() {
        $this->product = new Product();
    }
    public function index(){
        $products = $this->product->getAll();
        require_once 'views/home.php';
    }
    public function show($id)
    {
        $product = $this->product->getById($id);
        require_once './views/single-product/single-product.php';
    }
};
?>