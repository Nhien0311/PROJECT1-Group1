<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/VariantController.php';


require_once 'models/ProductModel.php';
require_once 'models/AccountModel.php';
require_once 'models/CategoryModel.php';
require_once 'models/VariantModel.php';
$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => (new DashboardController()) ->index(),
    
    // CRUD products
    'products'            => (new ProductController())->index(),
    'products/show'       => (new ProductController())->show($_GET['id'] ?? 0),
    'products/create'     => (new ProductController())->add(),
    'products/edit'       => (new ProductController())->edit($_GET['id'] ?? 0),
    'products/delete'     => (new ProductController())->delete($_GET['id'] ?? 0),

    'categories' => (new CategoryController())->index(),
    'categories/show' => (new CategoryController())->show($_GET['id'] ?? 0),
    'categories/create' => (new CategoryController())->add(),
    'categories/edit' => (new CategoryController())->edit($_GET['id'] ?? 0),
    'categories/delete'      => (new CategoryController())->delete($_GET['id'] ?? 0),
    
    // CRUD accounts
    'accounts'            => (new AccountController())->index(),
    'accounts/show'       => (new AccountController())->show($_GET['id'] ?? 0),
    'accounts/create'     => (new AccountController())->create(),
    'accounts/edit'       => (new AccountController())->edit($_GET['id']?? 0),
    'accounts/delete'       => (new AccountController())->delete($_GET['id'] ?? 0),

    'variants'            => (new VariantController())->index(),
    'variants/show' => (new VariantController())->show($_GET['id'] ?? 0),
}
?>