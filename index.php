<?php
session_start();
if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = []; // Khởi tạo giỏ hàng nếu chưa tồn tại
}
require_once 'commons/env.php';
require_once 'commons/function.php';

require_once 'controllers/HomeController.php';

require_once 'models/cart.php';

require_once 'admin/models/ProductModel.php';
require_once 'admin/models/CategoryModel.php';
require_once 'models/product.php';
require_once 'models/user.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),

    'carts' => (new HomeController())->cart(),

    'single-product' => (new HomeController())->show(id: $_GET['id'] ?? 0),

    'checkout' => (new HomeController())->checkout(),
    'confirm_orders' => (new HomeController())->confirm_orders(),

    'product' => (new HomeController())->productByCategory(),

    'single-product/show' => (new HomeController())->show($_GET['id'] ?? 0),
    'register' => (new AuthController())->register(),
    'login' => (new AuthController())->login(),
    'logout' => (new AuthController())->logout()
};

?>