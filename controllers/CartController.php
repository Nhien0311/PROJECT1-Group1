<?php
class CartController
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
        require_once './views/carts/cart.php';
    }
};
?>