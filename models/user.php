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
        $sql = "SELECT * FROM accounts WHERE user_name LIKE '%$user_name%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inforAccount($account_id)
    {
        try {
            $sql = "SELECT * FROM accounts WHERE account_id = :account_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':account_id' => $account_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function create($data)
    {
        unset($data['role_id']);
        $sql = "INSERT INTO accounts (user_name, email, password, phone, address) 
                VALUES (:user_name, :email, :password, :phone, :address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function updateAccount($account_id, $user_name, $email, $phone, $address)
    {
        try {
            $sql = "UPDATE accounts SET user_name = :user_name, email = :email, phone = :phone, address = :address WHERE account_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':user_name' => $user_name,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':address' => $address,
                    ':id' => $account_id
                ]
            );
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function updatePass($account_id, $pass) 
    {
        try{
            $sql = "UPDATE accounts SET password = :password WHERE account_id = :account_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':account_id' => $account_id,
                    ':password' => $pass
                ]
                );
                return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
}
?>