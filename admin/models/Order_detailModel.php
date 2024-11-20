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
        $sql = "SELECT * FROM `order_details` WHERE order_detail_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }
    public function edit($id,$data) {
        $sql = "UPDATE `order_details` SET `quantity`=:quantity,`price`=:price,`variant_id`=:variant_id,`account_id`=:account_id,`created_at`=:created_at WHERE order_detail_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function delete($id) {
        $sql = "DELETE FROM `order_details` WHERE order_detail_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
    }
}
?>