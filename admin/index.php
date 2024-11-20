<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/DashboardController.php';
<<<<<<< HEAD
require_once 'controllers/Order_detailController.php';
=======
require_once 'controllers/VariantController.php';
>>>>>>> 5a9d2274adcf4d2a66246a12cf05f7de261ba1a1


require_once 'models/ProductModel.php';
require_once 'models/AccountModel.php';
require_once 'models/CategoryModel.php';
<<<<<<< HEAD
require_once 'models/Order_detailModel.php';
=======
require_once 'models/VariantModel.php';
>>>>>>> 5a9d2274adcf4d2a66246a12cf05f7de261ba1a1
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
<<<<<<< HEAD
    
    // CRUD order_details

    'order_details' => (new Order_detailController())->index(),
=======

    'variants'            => (new VariantController())->index(),
    'variants/show' => (new VariantController())->show($_GET['id'] ?? 0),
>>>>>>> 5a9d2274adcf4d2a66246a12cf05f7de261ba1a1
}
?>