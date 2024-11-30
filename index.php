<?php
session_start();
require_once 'commons/env.php';
require_once 'commons/function.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/CartController.php';
require_once 'controllers/AuthController.php';

require_once 'admin/models/ProductModel.php';
require_once 'admin/models/CategoryModel.php';
require_once 'models/product.php';
require_once 'models/user.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),

    'product' => (new HomeController())->productByCategory(),
    'carts' => (new CartController())->index(),
    'single-product/show' => (new HomeController())->show($_GET['id'] ?? 0),
    'register' => (new AuthController())->register(),
    'login' => (new AuthController())->login(),
    'logout' => (new AuthController())->logout()
};

?>