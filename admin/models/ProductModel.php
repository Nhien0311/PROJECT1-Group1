<?php
class Product{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO products (name, category_id, thumbnail, short_description, content, status, views, sale_price, price) VALUES
        (:name, :category_id, :thumbnail, :short_description, :content, :status, :views, :sale_price, :price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        $sql = "SELECT thumbnail FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();

        if(empty($data['thumbnail'])){
            $data['thumbnail'] = $product['thumbnail'];
        }

        $sql = "UPDATE products SET
                name = :name,
                category_id = :category_id,
                thumbnail = :thumbnail,
                short_description = :short_description,
                content = :content,
                status = :status,
                views = :views,
                sale_price = :sale_price,
                price = :price
                WHERE product_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
?>