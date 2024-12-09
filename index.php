<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Khởi tạo giỏ hàng nếu chưa tồn tại
}
require_once 'commons/env.php';
require_once 'commons/function.php';
// User
require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DashboardController.php';

require_once 'models/cart.php';
require_once 'models/showcart.php';
require_once 'models/product.php';
require_once 'models/user.php';

// Admin
require_once 'admin/controllers/ProductController.php';
require_once 'admin/controllers/CategoryController.php';
require_once 'admin/controllers/AccountController.php';
require_once "admin/controllers/ordersController.php";
require_once "admin/controllers/ratingCotroller.php";
require_once 'admin/controllers/Order_detailController.php';
require_once 'admin/controllers/VariantController.php';



require_once 'admin/models/ProductModel.php';
require_once 'admin/models/AccountModel.php';
require_once 'admin/models/CategoryModel.php';
require_once "admin/models/ordersModel.php";
require_once "admin/models/ratingModel.php";
require_once 'admin/models/Order_detailModel.php';
require_once 'admin/models/VariantModel.php';

$act = $_GET['act'] ?? '/';

define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST'] . '/PROJECT1-Group1/');

match ($act) {

    // User

    '/'                 => (new HomeController()) ->index(),
    'home'              => (new DashboardController())->index(),

    'carts'             => (new HomeController())->cart(),

    'single-product'    => (new HomeController())->show(id: $_GET['id'] ?? 0),

    'checkout'          => (new HomeController())->checkout(),
    'confirm_orders'    => (new HomeController())->confirm_orders(),
    'bill'              => (new HomeController())->bill(),

    'product'           => (new HomeController())->productByCategory(),

    'single-product/show' => (new HomeController())->show($_GET['id'] ?? 0),
    'register'            => (new AuthController())->register(),
    'login'               => (new AuthController())->login(),
    'logout'              => (new AuthController())->logout(),
    'edit-account'        => (new AuthController())->editAccount(),
    'edit-inforPersonal'  => (new AuthController())->editInforPersonal(),
    'edit-password'           => (new AuthController())->editPass(),


    // Admin

       // CRUD products
       'products'            => (new ProductController())->index(),
       'products/show'       => (new ProductController())->show($_GET['id'] ?? 0),
       'products/create'     => (new ProductController())->add(),
       'products/edit'       => (new ProductController())->edit($_GET['id'] ?? 0),
       'products/delete'     => (new ProductController())->delete($_GET['id'] ?? 0),
   
       'categories'              => (new CategoryController())->index(),
       'categories/show'         => (new CategoryController())->show($_GET['id'] ?? 0),
       'categories/create'       => (new CategoryController())->add(),
       'categories/edit'         => (new CategoryController())->edit($_GET['id'] ?? 0),
       'categories/delete'       => (new CategoryController())->delete($_GET['id'] ?? 0),
       
       // CRUD accounts
       'accounts'            => (new AccountController())->index(),
       'accounts/show'       => (new AccountController())->show($_GET['id'] ?? 0),
       'accounts/create'     => (new AccountController())->create(),
       'accounts/edit'       => (new AccountController())->edit($_GET['id']?? 0),
       'accounts/delete'       => (new AccountController())->delete($_GET['id'] ?? 0),
   
       //CRUD orders
       'orders'   => (new ordersController)->index(),
       'orders/delete' =>(new ordersController())->delete($_GET['id'] ?? 0),
       'orders/edit'   =>(new ordersController())->edit($_GET['id'] ?? 0),
       'orders/show'   =>(new ordersController())->show($_GET['id'] ?? 0),
   
       //CRUD ratings
       'ratings'   => (new ratingController)->index(),
       'ratings/delete' =>(new ratingController())->delete($_GET['id'] ?? 0),
       'ratings/edit'   =>(new ratingController())->edit($_GET['id'] ?? 0),
       'ratings/show'   =>(new ratingController())->show($_GET['id'] ?? 0),
       
       
       // CRUD order_details
   
       'order_details'          => (new Order_detailController())->index(),
       'order_details/show'     => (new Order_detailController())->show($_GET['id'] ?? 0),
       'order_details/delete'   => (new Order_detailController())->delete($_GET['id' ?? '']),
   
       // CRUD variants
       'variants'              => (new VariantController())->index(),
       'variants/show'         => (new VariantController())->show($_GET['id'] ?? 0),
       'variants/create'       => (new VariantController())->add(),
       'variants/edit'         => (new VariantController())->edit($_GET['id'] ?? 0),
       'variants/delete'       => (new VariantController())->delete($_GET['id'] ?? 0),
   
};

?>