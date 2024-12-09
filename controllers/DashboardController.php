<?php

class DashboardController {
    public function __construct() {
        // Kiểm tra session 'user'
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            // Kiểm tra vai trò người dùng
            if ($_SESSION['user']['role_id'] !== 1) {
                header('Location: ?act=/');
                exit;
            }
        } else {
            header('Location: ?act=login');
            exit;
        }
    }
    public function index() {
        require_once "./views/dashboard.php";
    }
}