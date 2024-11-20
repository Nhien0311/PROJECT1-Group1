<?php
class Variant
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll() {
        $sql = "SELECT * FROM variants";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM variants WHERE variant_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO variants (product_id, price, quantity, thumbnail, status, description, name) VALUES
        (:product_id, :price, :quantity, :thumbnail, :status, :description, :name )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function edit($id, $data)
    {
        $sql = "SELECT thumbnail FROM variants WHERE variant_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $variant = $stmt->fetch();

        if(empty($data['thumbnail'])){
            $data['thumbnail'] = $variant['thumbnail'];
        }

        $sql = "UPDATE variants SET
                product_id = :product_id,
                price = :price,
                quantity = :quantity,
                thumbnail = :thumbnail,
                status = :status,
                description = :description,
                name = :name
                WHERE variant_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM variants WHERE variant_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>