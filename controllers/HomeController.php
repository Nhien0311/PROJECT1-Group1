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
    public function cart() {
        // thêm sản phẩm khi khách bấm mua ngay hoặc thêm vào giỏ hàng
        if(isset($_POST['addToCart']) && $_POST['id'] > 0) {
            // tìm sản phẩm khác hàng đã thêm bằng id
            $product = $this->product->find($_POST['id']);
            $total_amount = $product['price'] * $_POST['quantity'];
            // var_dump($total_amount);
            // die;
            // var_dum(gettype); kiểm tra 
            //chèn thông tin sản phẩm vào giỏ hàng
            $array_pro = [
                "thumbnail" => $product['thumbnail'],
                "name" => $product['name'],
                "price" => $product['price'],
                "quantity" => $product['quantity'],
                "total_amount" => $total_amount
            ];
            array_push($_SESSION['myCart'], $array_pro);
          
        }
        require_once './views/carts/cart.php';
    }
    public function checkout() {
        require_once './views/checkout.php';
    }
};
?>