<?php

class DashboardController {
    public function __construct() {
        // Kiểm tra xem có session 'user' không
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            // Chuyển hướng về trang đăng nhập
            header('Location: ?act=login');
            exit;
        }
    }
    public function index() {
        require_once "./views/dashboard.php";
    }
}