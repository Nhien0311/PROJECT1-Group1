<?php
class Author
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function login($nameAuthor, $passAuthor)
    {
        $conn = $this->conn;

        $sql = "SELECT * FROM accounts WHERE user_name = :user_name AND password = :password AND role_id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['user_name' => $nameAuthor, 'password' => $passAuthor]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['admin'] = true;
            $_SESSION['user'] = $user['email'];
            header('Location: ?act=/');
        } else {
            $_SESSION['error']= 'Sai !!!';
            header('Location: ?act=login');
            
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?act=login');
    }
    public function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin/auth/login');
        }
    }
}
?>