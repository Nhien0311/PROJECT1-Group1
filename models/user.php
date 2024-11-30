<?php
class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function create($data)
    {
        unset($data['role_id']);
        $sql = "INSERT INTO accounts (user_name, email, password, phone, address) 
                VALUES (:user_name, :email, :password, :phone, :address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
?>