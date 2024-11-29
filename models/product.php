<?php

class Products
{
    private $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT product_id, name, price, thumbnail FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function category()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId)
    {
        $sql = "SELECT product_id, name, price, thumbnail FROM products WHERE category_id = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>