<?php
class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM accounts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findUser($user_name)
    {
        $sql = "SELECT * FROM accounts WHERE user_name = :user_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_name' => $user_name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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