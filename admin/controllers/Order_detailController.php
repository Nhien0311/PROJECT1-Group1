<?php
class Order_detailController {
    private $order_detail;
    public function __construct() {
        $this->order_detail = new Order_detailModel();
    }
    public function index() {
        $order_details = $this->order_detail->getAll();
        require_once "views/order_details/index.php";
    }
    public function show($id) {
        $order_details = $this->order_detail->getById($id);
        require_once 'views/order_details/show.php';
    }
    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'variant_id' => $_POST['variant_id'],
                'account_id' => $_POST['account_id'],
                'created_at' => $_POST['created_at'],
            ];
            $this->order_detail->edit($id, $data);
            header('Location:?act=order_details');
        }else {
            $order_details = $this->order_detail->getById($id);
            require_once 'views/order_details/edit.php';
        }
    }
    public function delete($id) {
        $this->order_detail->delete($id);
        header('Location:?act=order_details');
    }
}
?>