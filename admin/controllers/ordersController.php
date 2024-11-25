<?php
class ordersController {
    public $ordersModel;

    function __construct() {
        // Sửa lỗi vòng lặp vô hạn
        $this->ordersModel = new ordersModel(); 
    }

    // Hàm hiển thị danh sách đơn hàng
    function index() {
        $orders = $this->ordersModel->getAll();
        require_once 'views/orders/index.php';
    }


   

    // Hàm xóa đơn hàng
    function delete($id) {
        // Sử dụng đúng đối tượng để xóa
        if ($this->ordersModel->delete($id)) {
            header("Location:?act=orders");
        } else {
            echo "Lỗi: Không thể xóa đơn hàng.";
        }
     }
     public function edit($id)
     {
        try {
        // Khởi tạo mảng lỗi
        $_SESSION['errors'] = [];
        // Kiểm tra xem id có tồn tại trong url không
        if(!isset($_GET['id'])) {
            throw new Exception('Thiếu tham số id');
        }
        $orders = $this->ordersModel->getById($id);
        if(!$orders) {
            throw new Exception("Đơn hàng có ID = $id không tồn tại");
        }
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $data = [
                 'created_at' => $_POST['created_at'],
                 'phone' => $_POST['phone'],
                 'name' => $_POST['name'],
                 'address' => $_POST['address'],
                 'status' => $_POST['status'],
                 'variant_id' => $_POST['variant_id'],
                 'account_id' => $_POST['account_id'],
                 'total_amount' => $_POST['total_amount'],
             ];

             // Validate dữ liệu
             if (empty($data['phone']) || strlen($data['phone']) !== 10 || $data['phone'][0] !== '0' || !is_numeric($data['phone'])) {
                $_SESSION['errors']['phone'] = "Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0";
            };
            
            if(empty($data['name']) || strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Tên sản phẩm không được để trống, độ dài không quá 50 ký tự";
            };

            if(empty($data['address']) || strlen($data['address']) > 50) {
                $_SESSION['error']['address'] = "Địa chỉ không được để trống và độ dài không quá 50 ký tự";
            }

            // Nếu có lỗi, quay lại trang edit và hiển thị lỗi
            if(!empty($_SESSION['errors'])) {
                require_once "views/orders/edit.php";
                return;
            }
             // Nếu không có lỗi gọi hàm cập nhật đơn hàng
            $orders = $this->ordersModel->edit($id, $data);
             $_SESSION['success'] = true;
             $_SESSION['msg'] = "Đơn hàng đã được cập nhật thành công";
             header('Location:?act=orders');
           
         } else {
             $orders = $this->ordersModel->getById($id);
             require_once 'views/orders/edit.php';
         }
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location:?act=orders');
        }

     }
    public function show($id) {
        try {
        //Kiểm tra xem id đơn hàng có tồn tại trong url không
        if(!isset($_GET['id'])) {
            throw new Exception('Thiếu tham số id');
        }
        $order = $this->ordersModel->getById($id);
        if(!$order) {
            throw new Exception("Đơn hàng có ID = $id không tồn tại");
        }
        // nếu id đơn hàng có tồn tại sẽ hiện ra đơn hàng chi tiết
        $orders = $this->ordersModel->getById($id);
        $_SESSION['success'] = true;
        require_once 'views/orders/show.php';
    } catch (Exception $e) {
        $_SESSION['success'] = false;
        $_SESSION['msg'] = $e->getMessage();
        header('Location:?act=orders');
    }
    }
     
 }
?>
