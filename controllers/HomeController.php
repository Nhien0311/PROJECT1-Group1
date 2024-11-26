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
};
?>