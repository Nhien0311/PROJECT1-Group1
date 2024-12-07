<?php
class AuthController
{
    private $conn;

    public function __construct()
    {
        $this->conn = new User();
    }
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
                $_SESSION['error_email'] = 'Email không đúng định dạng !';
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

    public function editAccount()
    {
        $account_id = $_SESSION['user']['account_id'] ?? '';
        $infor = $this->conn->inforAccount($account_id);
        require_once './views/edit-account.php';
        
    }

    public function editInforPersonal()
    {
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account_id = $_POST['account_id'];
            $user_name = $_POST['user_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';

            $_SESSION['name'] = $user_name ?? '';
            $_SESSION['email'] = $email ?? '';

            $errors = [];
            if(empty($user_name)) {
                $errors['name'] = 'Họ tên không được để trống !';
            } else if (strlen($user_name) < 2 || strlen($user_name) > 30)
            {
                $errors['name'] = 'Họ tên phải có ít nhất 8 ký tự !';
            }

            if(empty($email)) {
                $errors['email'] = 'Email không được để trống !';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Địa chỉ email không hợp lệ!';
            }

            if(empty($phone)) {
                $errors['phone'] = 'Số điện thoại không được để trống !';
            } else if (strlen($phone) !== 10) {
                $errors['phone'] = 'Số điện thoại phải có 10 số !';
            } else if (!is_numeric($phone)) {
                $errors['phone'] = 'Số điện thoại không đúng định dạng !';
            }

            if(empty($address)) {
                $errors['address'] = 'Địa chỉ không được để trống !';
            } else if (strlen($address) < 3 || strlen($address) > 40){
                $errors['address'] = 'Địa chỉ phải có ít nhất 3 kí tự !';
            } else if (!preg_match("/^[a-zA-Z ]+$/", $address)){
                $errors['address'] = 'Địa chỉ không được chứa kí tự đặc biệt !';
            }

            $_SESSION['errors'] = $errors;

            if(empty($errors)) {
                $status = $this->conn->updateAccount($account_id, $user_name, $email, $phone, $address);
                header("Location: ?act=edit-account");
                exit();
            }else{
                header("Location: ?act=edit-account");
                exit();
            }
        }
    }

    public function editPass() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account_id = $_SESSION['user']['account_id'] ?? '';

            $old_pass = $_POST['old_pass'] ?? '';
            $new_pass = $_POST['new_pass'] ?? '';
            $confirm_pass = $_POST['confirm_pass'] ?? '';

            $user = $this->conn->inforAccount($account_id);

            $errors = [];
            
            if (!empty($old_pass)) {
                if ($old_pass !== $user['password']) {
                    $errors['old_pass'] = 'Mật khẩu cũ không đúng !';
                }
            }
            if (!empty($new_pass) && !empty($confirm_pass)) {
                if ($new_pass !== $confirm_pass) {
                    $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng !';
                }
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không được để trống !';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống !';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không được để trống !';
            }
            $_SESSION['errors'] = $errors;

            if(!$errors) {
                $status = $this->conn->updatePass($user['account_id'], $new_pass);
                header("Location:?act=edit-account");
            }else{
                header("Location:?act=edit-account");
                exit();
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location:?act=login');
        die;
    }
}
