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
        if(isset($_SESSION['user'])){
            header("Location:?act=home");
            die;
        }
        if(isset($_SESSION['user'])){
            header("Location:?act=/");
            die;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user_name = $_POST['name_author'];
            $password = $_POST['pass_author'];

            $user = (new User)->findUser($user_name);
           
            if ($user) {
                if (password_verify($password, $user['password']))
                {
                    $_SESSION['user'] = $user;
                    if ($user['role_id'] == 1){
                        header("Location:?act=home");
                        die;
                    } else {
                        header("Location:?act=/");
                        die;
                    }
                    
                } else {
                    $error = "Sai email hoặc mật khẩu !";
                }
            } else {
                $error = "Sai email hoặc mật khẩu !";
            }
        }
        $message = session_flash('message');
        include 'views/login.php';
        return $message;
        return $error;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location:?act=login');
        die;
    }
}
?>