<?php

class ratingModel {
    public $conn;
    function __construct() {
        $this->conn = connectDB();
    }

    function getAll() {
        $sql = "SELECT * FROM ratings";
        return $this->conn->query($sql);
    }

    function delete($id) {
        $sql = "DELETE FROM ratings WHERE rating_id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM ratings WHERE rating_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function edit($id, $data)
    {
        
        $sql = "UPDATE ratings SET product_id=:product_id,content=:content,order_id=:order_id
        WHERE rating_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
   
}
?>
