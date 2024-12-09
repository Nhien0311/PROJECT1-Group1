<?php include "views/layouts/header.php"; ?>
<link rel="stylesheet" href="./css/cart.css">
<link rel="stylesheet" href="./css/bill.css">
<section class="cart py-3">
    <div class="container">
        <h1 style="text-align:center;color: red;">Lịch sử đơn hàng</h1>

        <div class="row">
            <div class="col-12 col-lg-9 col-xl-11">
                <div class="card">
                    <div class="card-header">
                        <!-- Header nếu cần -->
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt hàng</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($order_details)): ?>
                                <?php foreach ($order_details as $order): ?>
                                    <tr>
                                        <td><?= $order['order_id'] ?></td>
                                        <td><?= $order['created_at'] ?></td>
                                        <td><?= $order['quantity'] ?></td>
                                        <td><?= number_format($order['total_amount'], 0, ',', '.') ?> đ</td>
                                        <td>
                                            <?php
                                            // Hiển thị trạng thái đơn hàng
                                            if ($order['status'] == 0) {
                                                echo "Đơn hàng mới";
                                            } elseif ($order['status'] == 1) {
                                                echo "Đã xác nhận";
                                            } elseif ($order['status'] == 2) {
                                                echo "Đang giao hàng";
                                            } elseif ($order['status'] == 3) {
                                                echo "Đơn hàng thành công";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                            <div class="empty-order-message">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                <p><strong>Lịch sử đơn hàng trống</strong></p>
                                                <a href="?act=/" class="btn btn-secondary">Tiếp tục mua sắm</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "./views/layouts/footer.php"; ?>
