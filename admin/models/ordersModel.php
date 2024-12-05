<?php

class ordersModel {
    public $conn;
    function __construct() {
        $this->conn = connectDB();
    }

    function getAll() {
        $sql = "SELECT * FROM orders";
        return $this->conn->query($sql);
    }

    function delete($id) {
        $sql = "DELETE FROM orders WHERE order_id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM orders WHERE order_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function edit($id, $data)
    {    
        unset($data['product_id']);
        $sql = "UPDATE orders SET created_at=:created_at,phone=:phone,name=:name,address=:address,status=:status,variant_id=:variant_id,account_id=:account_id,total_amount = :total_amount WHERE order_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    public function create($data)
    {
        $sql = "INSERT INTO orders(created_at, phone, name, address, email, account_id, total_amount, method) VALUES (:created_at, :phone, :name, :address, :email, :account_id, :total_amount, :method)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }
 
}
?>
