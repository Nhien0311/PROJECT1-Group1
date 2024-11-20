<?php
class Order_detailController {
    private $order_detail;
    public function __construct() {
        $this->order_detail = new Order_detailModel();
    }
    public function index() {
        $ordet_details = $this->order_detail->getAll();
        require_once "views/order_details/index.php";
    }
    public function show($id) {
        $ordet_details = $this->order_detail->getById($id);
        require_once 'views/order_details/show.php';
    }
}
?>