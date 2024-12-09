<?php
class Order_detailModel
{
    private $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM `order_details`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM `order_details` WHERE order_detail_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `order_details` WHERE order_detail_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function create_order_detail($thumbnail, $name, $quantity, $price, $total_amount, $order_id, $product_id)
    {
        $sql = "INSERT INTO order_details (thumbnail, name, quantity, price, total_amount, order_id, product_id) 
                VALUES (:thumbnail, :name, :quantity, :price, :total_amount, :order_id, :product_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':thumbnail' => $thumbnail,
            ':name' => $name,
            ':quantity' => $quantity,
            ':price' => $price,
            ':total_amount' => $total_amount,
            ':order_id' => $order_id,
            ':product_id' => $product_id
        ]);
    }
    function count_order_detail($order_id)
    {
        // Truy vấn SQL để lấy tổng số lượng sản phẩm trong mỗi đơn hàng
        $sql = "SELECT SUM(quantity) AS total_quantity 
        FROM order_details 
        WHERE order_id = :order_id 
        GROUP BY order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['order_id' => $order_id]);
        $result = $stmt->fetch();
        return $result ? $result['total_quantity'] : 0;
    }

}
?>