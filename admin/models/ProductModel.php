<?php
class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        $sql = "SELECT p.*, p.name FROM products p LEFT JOIN categories c ON p.category_id = c.category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

<<<<<<< HEAD
    public function getWhere($condition = '')
    {
        $sql = "SELECT p.*, p.name FROM products p LEFT JOIN categories c ON p.category_id = c.category_id";
        
        if ($condition != '') {
            $sql .= ' WHERE ' . $condition;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
=======
    public function getTop_8(){
        $sql = "SELECT p.* FROM products p 
        LEFT JOIN categories c ON p.category_id = c.category_id 
        ORDER BY p.product_id DESC 
        LIMIT 8;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> 7ec5468e75a36198303b5fb28a6e90556bf9a725
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, p.name FROM products p LEFT JOIN categories c ON p.category_id = c.category_id WHERE p.product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        unset($data['views']);
        $sql = "INSERT INTO products (name, category_id, thumbnail, short_description, content, status, sale_price, price, quantity) VALUES
        (:name, :category_id, :thumbnail, :short_description, :content, :status, :sale_price, :price, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        $sql = "SELECT thumbnail FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();

        if (empty($data['thumbnail'])) {
            $data['thumbnail'] = $product['thumbnail'];
        }
        unset($data['views']);
        $sql = "UPDATE products SET
                name = :name,
                category_id = :category_id,
                thumbnail = :thumbnail,
                short_description = :short_description,
                content = :content,
                status = :status,
                -- views = :views,
                sale_price = :sale_price,
                price = :price,
                quantity = :quantity
                WHERE product_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

}
?>