<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';

require_once './controllers/HomeController.php';
require_once './controllers/CartController.php';
require_once './controllers/productController.php';

require_once './model/ProductQuery.php';

//Nhúng file bên admin
// require_once './admin/controllers/ProductController.php';
// require_once './admin/controllers/ordersController.php';

// require_once './admin/models/ProductModel.php';
// require_once './admin/models/ordersModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),

    'carts' => (new CartController())->index(),
    
};

?>