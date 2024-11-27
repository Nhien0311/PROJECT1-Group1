<?php
session_start();
require_once 'commons/env.php';
require_once 'commons/function.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/CartController.php';

require_once 'admin/models/ProductModel.php';
require_once 'admin/models/CategoryModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),

    'carts' => (new CartController())->index(),

    'single-product/show' => (new HomeController())->show($_GET['id'] ?? 0),
};


?>