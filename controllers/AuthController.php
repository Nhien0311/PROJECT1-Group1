<?php
class AuthController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST;
            
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);

            $data['password'] = $password;

            (new User)->create($data);

            $_SESSION['message'] = 'Đăng ký thành công !';
            header('Location: ?act=login');
            die;
        }
        require_once './views/register.php';
    }

    public function login()
    {
        include 'admin/views/login.php';
    }

    public function logout()
    {

    }
}
?>