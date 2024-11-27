<?php
class CartController
{
    private $product;
    public function __construct() {
        $this->product = new Product();
    }
    public function index(){
        if (isset($_POST['btn_addtocart'])) {
            // lấy dữ liệu trên form về
            $id = $_POST['product_id'];
            $name = $_POST['name'];
            $thumbnail = $_POST['thumbnail'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
        }
        require_once './views/carts/cart.php';
    }
};
?>