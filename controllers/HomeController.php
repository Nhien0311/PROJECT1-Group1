<?php
class HomeController
{
    private $productModel;
    private $product;
    private $category;
    private $order;
    private $order_detail;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->productModel = new Products();
        $this->order = new ordersModel();
        $this->order_detail = new Order_detailModel();
    }
    public function index()
    {
     
        $query = $_GET;
    
        $search = isset($query['search']) ? $query['search'] : '';
        $condition = '';
        $message = ''; // Biến để lưu thông báo
    
        if ($search != '') {
            // Loại bỏ khoảng trắng thừa ở đầu/cuối và xử lý chuỗi để phù hợp với LIKE
            $search = trim($search);
            $search = preg_replace('/\s+/', '%', $search); // Thay thế khoảng trắng liên tiếp bằng ký tự '%'
            $condition .= 'p.name LIKE "%' . $search . '%"';
            
            $products = $this->product->getWhere($condition);
    
            if (!empty($products)) {
                $message = 'Tìm kiếm thành công! Có ' . count($products) . ' sản phẩm được tìm thấy.';
            } else {
                $message = 'Không tìm thấy sản phẩm nào khớp với từ khóa "' . htmlspecialchars($search) . '".';
            }
        } else {
            $products = $this->product->getTop_8();
        }
   
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
    //Xóa rỗng giỏ hàng
    if(isset($_GET['emptyCart']) && ($_GET['emptyCart'])==1) {
        unset($_SESSION['cart']);
        header('Location:?act=carts');
    }
    // Xóa key giỏ hàng
    if(isset($_GET['delkey']) && is_numeric($_GET['delkey'])) {
        unset($_SESSION['cart'][$_GET['delkey']]);
        header('Location:?act=carts');
    }
    if(isset($_POST['addToCart'])) {
        // lấy dữ liệu trên form về
            $id = $_POST['id'];
            $name = $_POST['name'];
            $thumbnail = $_POST['thumbnail'];
            $price = $_POST['price'];
            if(isset($_POST['quantity']) && ($_POST['quantity'] > 0)){
                $quantity = $_POST['quantity'];
            }else {
            $quantity = 1;
            }
            // kiểm tra sản phẩm có trong giỏ hàng k
            $check = false;
            foreach ($_SESSION['cart'] as $key => $value) {
                if($value['id'] == $id) {
                    $check = true;
                    $_SESSION['cart'][$key]['quantity']+=$quantity;
                }
            }
            // nếu có tăng số lượng sản phẩm trong giỏ hàng

            // còn không trùng thì thêm ms
            if(!$check) {
            // tạo một mảng sản phẩm
            $item = array('id'=>$id,'name'=>$name,'thumbnail'=>$thumbnail,'price'=>$price,'quantity'=>$quantity);
            // add vào giỏ hàng
            array_push($_SESSION['cart'],$item);
        }
            // chuyển trang
            header('Location:?act=carts');
    }
    require_once './views/carts/cart.php';
}

    public function checkout()
    {
        if (isset($_POST['dongythanhtoan'])) {
            // lấy thông tin trên form thanh toán insert vào orders
        //    var_dump($_POST);die;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kiểm tra sự tồn tại của các key trong $_POST
                $data = [
                    'created_at' => date("H:i:s d/m/Y"),
                    'phone' => $_POST['phone'],
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'email' => $_POST['email'],
                    'account_id' => $_SESSION['user']['account_id'],
                    'total_amount' => $_POST['tongdonhang'],
                    'method' => $_POST['method']
                ];      
                      
                $order_id = $this->order->create($data);
                // var_dump($order_id); 
                if(isset($_SESSION['cart'])&&(count($_SESSION['cart']) > 0)) {
                    foreach ($_SESSION['cart'] as $item) {
                        $thumbnail = $item['thumbnail'];
                        $name = $item['name'];
                        $quantity = $item['quantity'];
                        $price = $item['price'];
                        $total_amount = $price * $quantity;
                        $id = $item['id'];
                        $this->order_detail->create_order_detail($thumbnail,$name,$quantity,$price,$total_amount,$order_id,$id);
                    }
                }
                header("Location:?act=confirm_orders");
            }
        }
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