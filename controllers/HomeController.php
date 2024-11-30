<?php
class HomeController
{
    private $productModel;
    private $product;
    private $category;
    private $cart;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->productModel = new Products();
        $this->cart = new cart();
    }
    public function index()
    {
        $products = $this->product->getTop_8();
        $categories = $this->category->getAll();
        require_once './views/home.php';
    }
    public function show($id)
    {
        $product = $this->product->getById($id);
        require_once './views/single-product/single-product.php';
    }
    public function cart()
    {
        // var_dump($_POST);die;
        // Xóa rỗng giỏ hàng
        if (isset($_GET['emptycart']) && is_numeric($_GET['emptycart']) == 1) {
            unset($_SESSION['myCart']);
            header('Location:?act=carts');
        }
        // Xóa sản phẩm giỏ hàng
        if (isset($_GET['delkey']) && is_numeric($_GET['delkey'])) {
            unset($_SESSION['myCart'][$_GET['delkey']]);
            header('Location:?act=carts');
        }
        // add sản phẩm vào giỏ hàng
        if (isset(($_POST['addToCart']))) {
            // lấy dữ liệu trên form về
            $id = $_POST['id'];
            $name = $_POST['name'];
            $thumbnail = $_POST['thumbnail'];
            $price = $_POST['price'];
            if (isset($_POST['quantity']) && ($_POST['quantity'] > 0)) {
                $quantity = $_POST['quantity'];
            } else {
                $quantity = 1;
            }
        // Kiểm tra sản phẩm có trong giỏ hàng không?
        $check = false;
        foreach ($_SESSION['myCart'] as $key => $value) {
            if ($value['id'] == $id) {
                $check = true;
                $_SESSION['myCart'][$key]['quantity'] += $quantity;
                break;
            }
        }
        // nếu có tăng số lượng sp trong giỏ hàng

        // còn không trùng thì thêm mớik
        if (!$check) {
            // tạo một mảng sản phẩm
            $item = array('id' => $id, 'name' => $name, 'thumbnail' => $thumbnail, 'price' => $price, 'quantity' => $quantity);
            // add vào giỏ hàng
            array_push($_SESSION['myCart'], $item);

            // phải chuyển trang
            header('Location:?act=carts');
        }
    }
        require_once './views/carts/cart.php';
    }

    public function checkout()
    {
        if (isset($_POST['dongythanhtoan'])) {
            // lấy thông tin trên form thanh toán insert vào orders
            // tạo đơn hàng thành công -> có id order mới

            // lấy idorder + thông tin giỏ hàng (for) insert order_details

            // xóa rỗng giỏ hàng session

            header('Location:?act=confirm_orders');
        }
        $thongtingiohang = $this->cart->showcart_tomtat();
        require_once './views/checkout/checkout.php';
    }
    public function confirm_orders()
    {
        require_once './views/checkout/confirm_orders.php';
    }

    public function productByCategory()
    {
        $categories = $this->productModel->category();
        $categoryId = $_GET['categoryId'] ?? null;

        if ($categoryId) {
            $products = $this->productModel->getProductsByCategory($categoryId);
        } else {
            $products = $this->productModel->getAll();
        }
        require_once 'views/products.php';

    }
}
;
?>