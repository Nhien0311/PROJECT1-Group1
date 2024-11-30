<?php
session_start();
require_once 'commons/env.php';
require_once 'commons/function.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/CartController.php';

require_once 'admin/models/ProductModel.php';

$act = $_GET['act'] ?? '/';

define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST'] . '/PROJECT1-Group1/');

match ($act) {
    '/' => (new HomeController())->index(),

    'carts' => (new CartController())->index(),
    'single-product' => (new HomeController())->show($_GET['id'] ?? 0),
};


?>