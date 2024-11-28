<?php
session_start();
if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = []; // Khởi tạo giỏ hàng nếu chưa tồn tại
}
require_once 'commons/env.php';
require_once 'commons/function.php';

require_once 'controllers/HomeController.php';

require_once 'admin/models/ProductModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),

    'carts' => (new HomeController())->cart(),
    'single-product' => (new HomeController())->show(id: $_GET['id'] ?? 0),
    'checkout' => (new HomeController()) -> checkout(),
    
};


?>