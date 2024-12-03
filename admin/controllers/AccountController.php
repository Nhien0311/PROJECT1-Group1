<?php
class AccountController
{
    private $account;
    public function __construct()
    {
        $this->account = new AccountModel();
    }
    public function index()
    {
        $accounts = $this->account->getAll();
        require_once "admin/views/accounts/index.php";
    }
    // Hiển thị chi tiết theo id
    public function show($id)
    {
        try {
            // Kiểm tra xem id có tồn tại trong url không
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"');
            }

            $accounts = $this->account->getById($id);
            if (!$accounts) {
                throw new Exception("Tài khoản có ID = $id không tồn tại");
            }
            $accounts = $this->account->getById($id);
            require_once 'admin/views/accounts/show.php';
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location:?act=accounts');
            exit;
        }
    }
    public function create()
    {
        try {
            // Khởi tạo mảng lỗi
            $_SESSION['errors'] = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kiểm tra sự tồn tại của các key trong $_POST
                $data = [
                    'user_name' => $_POST['user_name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'role_id' => $_POST['role_id']
                ];

                // Validate dữ liệu
                if (empty($data['user_name']) || strlen($data['user_name']) > 50) {
                    $_SESSION['errors']['user_name'] = "Tên không được để trống và độ dài không quá 50 ký tự.";
                }
                ;

                if (empty($data['email']) || strlen($data['email']) > 100 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['errors']['email'] = "Email là băt buộc, độ dài không quá 100 ký tự và phải đúng định dạng.";
                } else if (!empty($this->account->getById('email = :email', ['email' => $data['email']]))) {
                    $_SESSION['errors']['email'] = "Email đã tồn tại trong hệ thống.";
                }
                ;

                if (empty($data['password']) || strlen($data['password']) < 6 || strlen($data['password']) > 30) {
                    $_SESSION['errors']['password'] = "Mật khẩu bắt buộc, độ dài trong khoảng từ 6 đến 30 ký tự.";
                }
                ;

                if (empty($data['phone']) || strlen($data['phone']) !== 10 || $data['phone'][0] !== '0' || !is_numeric($data['phone'])) {
                    $_SESSION['errors']['phone'] = "Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0";
                }
                ;

                // Nếu có lỗi, quay lại trang tạo tài khoản và hiển thị lỗi
                if (!empty($_SESSION['errors'])) {
                    require_once "admin/views/accounts/create.php";
                    return;
                }
                ;

                // Nếu không có lỗi, gọi hàm tạo tài khoản
                $this->account->create($data);
                $_SESSION['success'] = true;
                $_SESSION['msg'] = "Tạo tài khoản thành công!";
                header('Location: ?act=accounts');
            } else {
                require_once "admin/views/accounts/create.php";
            }
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location:?act=accounts');
            exit;
        }
    }
    public function edit($id)
    {
        try {
            // Khởi tạo mảng lỗi
            $_SESSION['errors'] = [];
            // Kiểm tra xem id có tồn tại trong url không
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"');
            }

            $accounts = $this->account->getById($id);
            if (!$accounts) {
                throw new Exception("Tài khoản có ID = $id không tồn tại");
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'user_name' => $_POST['user_name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'role_id' => $_POST['role_id']
                ];


                // Validate dữ liệu
                if (empty($data['user_name']) || strlen($data['user_name']) > 50) {
                    $_SESSION['errors']['user_name'] = "Tên không được để trống và độ dài không quá 50 ký tự.";
                }
                ;

                if (empty($data['email']) || strlen($data['email']) > 100 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['errors']['email'] = "Email là băt buộc, độ dài không quá 100 ký tự và phải đúng định dạng.";
                } elseif (!empty($this->account->getById('email = :email AND id != :id', ['email' => $data['email'], 'id' => $id]))) {
                    $_SESSION['errors']['email'] = "Email đã tồn tại trong hệ thống.";
                }
                ;

                if (empty($data['phone']) || strlen($data['phone']) !== 10 || $data['phone'][0] !== '0' || !is_numeric($data['phone'])) {
                    $_SESSION['errors']['phone'] = "Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0";
                }
                ;

                // Nếu có lỗi, quay lại trang tạo tài khoản và hiển thị lỗi
                if (!empty($_SESSION['errors'])) {
                    require_once "admin/views/accounts/edit.php";
                    return;
                }
                ;
                // Nếu không có lỗi gọi hàm cập nhật tài khoản
                $this->account->edit($id, $data);
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Tài khoản đã được cập nhật thành công';
                header('Location:?act=accounts');
            } else {
                $accounts = $this->account->getById($id);
                require_once 'admin/views/accounts/edit.php';
            }
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location:?act=accounts');
            exit;
        }

    }
    // Xóa dữ liệu theo id
    public function delete($id)
    {
        try {
            // Kiểm tra xem id có tồn tại trong url không
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"');
            }

            $accounts = $this->account->getById($id);
            if (!$accounts) {
                throw new Exception("Tài khoản có ID = $id không tồn tại");
            }
            // Nếu all đk hợp lệ -> xóa tài khoản
            $this->account->delete($id);
            // Thiết lập thông báo thành công
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Tài khoản đã được xóa thành công';
            // chuyển hướng sau khi xóa thành công
            header('Location:?act=accounts');
            exit;
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location:?act=accounts');
            exit;
        }

    }

}

?>