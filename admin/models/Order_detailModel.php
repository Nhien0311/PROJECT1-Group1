<?php
class Order_detailModel {
    private $conn;
    public function __construct() {
        $this->conn = connectDB();
    }
    public function getAll() {
        $sql = "SELECT * FROM `order_details`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($id) {
        $sql = "SELECT * FROM `order_details`";
    }
}
?>