<?php
class Order_detailController {
    private $order_detail;
    public function __construct() {
        $this->order_detail = new Order_detailModel();
    }
    public function index() {
        $order_details = $this->order_detail->getAll();
        require_once "admin/views/order_details/index.php";
    }
    public function show($id) {
        $order_details = $this->order_detail->getById($id);
        require_once 'admin/views/order_details/show.php';
    }
    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'variant_id' => $_POST['variant_id'],
                'account_id' => $_POST['account_id'],
                'created_at' => $_POST['created_at'],
                'method' => $_POST['method'],
                'total_amount' => $_POST['total_amount']
            ];
            $this->order_detail->edit($id, $data);
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Cập nhật chi tiết đơn hàng thành công!',
                'icon' => 'success',
            ];
            header('Location:?act=order_details');
        }else {
            $order_details = $this->order_detail->getById($id);
            require_once 'admin/views/order_details/edit.php';
        }
    }
    public function delete($id) {
        try {
            $this->order_detail->delete($id);

            // Thông báo thành công
            $_SESSION['message'] = [
                'title' => 'Thành công!',
                'text' => 'Chi tiết đơn hàng đã được xóa!',
                'icon' => 'success',
            ];
        } catch (Exception $e) {
            // Thông báo lỗi
            $_SESSION['message'] = [
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa chi tiết đơn hàng: ' . $e->getMessage(),
                'icon' => 'error',
            ];
        }

        header('Location:?act=order_details');
        exit;
    }
}
?>