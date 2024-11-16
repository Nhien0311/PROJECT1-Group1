<?php
class Category
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        $sql = "UPDATE categories SET name = :name WHERE category_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>