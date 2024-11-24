<?php
class AccountModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `accounts`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM accounts WHERE account_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function create($data)
    {
        $sql = "INSERT INTO `accounts` (`user_name`, `email`, `password`, `phone`, `address`, `role_id`) 
                VALUES (:user_name, :email, :password, :phone, :address, :role_id)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function edit($id, $data) {
        unset($data['password']);
        $sql = "UPDATE `accounts` SET `user_name`= :user_name,`email`= :email, `phone`= :phone,`address`= :address,`role_id`= :role_id WHERE account_id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function delete($id) {
        $sql = "DELETE FROM `accounts` WHERE account_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>