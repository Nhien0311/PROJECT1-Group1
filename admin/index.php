<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/DashboardController.php';

$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => (new DashboardController()) ->index(),
}
?>