<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';

require_once 'controllers/DashboardController.php';
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';
$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => (new DashboardController()) ->index(),

    'products' => (new ProductController()) ->index(),
    'products/show' => (new ProductController()) ->show($_GET['id'] ?? 0),
    'products/create' => (new ProductController())->add(),
    'products/edit' => (new ProductController())->edit($_GET['id'] ?? 0),
    'products/delete'      => (new ProductController())->delete($_GET['id'] ?? 0),

    'categories' => (new CategoryController()) ->index(),
    'categories/show' => (new CategoryController()) ->show($_GET['id'] ?? 0),

}
?>