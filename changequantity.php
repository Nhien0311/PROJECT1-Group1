<?php
session_start();
include 'models/showcart.php';
// Kiểm tra và xử lý giá trị từ POST
$sl = isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0 ? (int)$_POST['quantity'] : 0;
$key = isset($_POST['key']) && is_numeric($_POST['key']) ? (int)$_POST['key'] : 0;

// Cập nhật số lượng sản phẩm
if(isset($_SESSION['cart'][$key])) {
    $_SESSION['cart'][$key]['quantity'] = $sl;
}
// Hiển thị giỏ hàng
echo showcart();
?>