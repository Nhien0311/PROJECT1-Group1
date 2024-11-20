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
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             // Process form submission
             $data = [
                 'created_at' => $_POST['created_at'],
                 'phone' => $_POST['phone'],
                 'name' => $_POST['name'],
                 'address' => $_POST['address'],
                 'status' => $_POST['status'],
                 'variant_id' => $_POST['variant_id'],
                 'account_id' => $_POST['account_id'],
             ];

             // Update the order
             $orders = $this->ordersModel->edit($id, $data);
             header('Location:?act=orders');
           
         } else {
             // Fetch the order data from the model
             $orders = $this->ordersModel->getById($id);
             require_once 'views/orders/edit.php';
         }
     }
     
 }
?>
