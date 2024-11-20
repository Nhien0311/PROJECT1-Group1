<?php
class AccountController {
    private $account;
    public function __construct() {
        $this->account = new AccountModel();
    }
    public function index() {
        $accounts = $this->account->getAll();
        require_once "views/accounts/index.php";
    }
    public function show($id) {
        $accounts = $this->account->getById($id);
        require_once 'views/accounts/show.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra sự tồn tại của các key trong $_POST
            $data = [
                'user_name' => $_POST['user_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'phone' => $_POST['phone'] ,
                'address' => $_POST['address'],
                'role_id' => $_POST['role_id']
            ];
            $this->account->create($data);
            header('Location: ?act=accounts');
        } else {
            require_once "views/accounts/create.php";
        }
    }
    public function edit($id)  {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_name' => $_POST['user_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'phone' => $_POST['phone'] ,
                'address' => $_POST['address'] ,
                'role_id' => $_POST['role_id'] 
            ];
            $this->account->edit($id,$data);
            header('Location:?act=accounts');
        }else {
            $accounts = $this->account->getById($id);
            require_once 'views/accounts/edit.php';
        }
    }
    public function delete($id)  {
        $this->account->delete($id);
        header('Location:?act=accounts');
    }

}

?>