<?php
class AuthController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $_POST;
            $errors = [];

            if($_POST['user_name'] == ''){
                $_SESSION['error_name'] = 'Tên không được để trống !';
                header('Location: ?act=register');
                die;
            } else if (strlen($_POST['user_name']) < 2 || strlen($_POST['user_name']) > 30) {
                $_SESSION['error_name'] = 'Tên phải có ít nhất 8 kí tự !';
                header('Location: ?act=register');
                die;
            }

            if($_POST['email'] == '') {
                $_SESSION['error_email'] = 'Email không được để trống !';
                header('Location: ?act=register');
                die;
            }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error_email'] = 'Email không hợp lệ !';
                header('Location: ?act=register');
                die;
            }
            
            if($_POST['password'] == ''){
                $_SESSION['error_pass'] = 'Mật khẩu không được để trống !';
                header('Location: ?act=register');
                die;
            } else if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 32) {
                $_SESSION['error_pass'] = 'Mật khẩu phải có ít nhất 8 kí tự !';
                header('Location: ?act=register');
                die;
            }
            $passwords_Enc = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['password'] = $passwords_Enc;

            if($_POST['phone'] == ''){
                $_SESSION['error_phone'] = 'Số điện thoại không được để trống !';
                header('Location: ?act=register');
                die;
            } else if (strlen($_POST['phone']) !== 10 ) {
                $_SESSION['error_phone'] = 'Số điện thoại phải có 10 số !';
                header('Location: ?act=register');
                die;
            } else if ($_POST['phone'][0] !== '0'){
                $_SESSION['error_phone'] = 'Số điện thoại phải bắt đầu từ số 0 !';
                header('Location: ?act=register');
                die;
            } else if (!is_numeric($_POST['phone'])){
                $_SESSION['error_phone'] = 'Số điện thoại phải là số !';
                header('Location: ?act=register');
                die;
            }

            if($_POST['address'] == ''){
                $_SESSION['error_address'] = 'Địa chỉ không được để trống !';
                header('Location: ?act=register');
                die;
            } else if (strlen($_POST['address']) < 3 || strlen($_POST['address']) > 30) {
                $_SESSION['error_address'] = 'Địa chỉ phải có ít nhất 3 kí tự !';
                header('Location: ?act=register');
                die;
            } else if (!preg_match("/^[a-zA-Z ]+$/", $_POST['address'])){
                $_SESSION['error_address'] = 'Địa chỉ không được chứa kí tự đặc biệt !';
                header('Location: ?act=register');
                die;
            }

            if (empty($errors)) {
                (new User)->create($data);
            } else {
                $_SESSION['error_name'] = $errors;
                $_SESSION['error_pass'] = $errors;
                $_SESSION['error_email'] = $errors;
                $_SESSION['error_phone'] = $errors;
                $_SESSION['error_address'] = $errors;
                
                header('Location: ?act=register');
                die;
            }

            $_SESSION['message'] = 'Đăng ký thành công !';
            header('Location: ?act=login');
            die;
        }
        require_once './views/register.php';
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header("Location:?act=home");
            die;
        }
        if (isset($_SESSION['user'])) {
            header("Location:?act=/");
            die;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_name = $_POST['name_author'];
            $password = $_POST['pass_author'];

            $user = (new User)->findUser($user_name);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    if ($user['role_id'] == 1) {
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
