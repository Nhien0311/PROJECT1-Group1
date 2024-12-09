<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng | Modelkit Store VN</title>
    <?php require_once "views/layout/libs_css.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div id="layout-wrapper">

        <?php
        require_once "views/layout/header.php";
        require_once "views/layout/sidebar.php";
        ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Danh sách đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['success'])) {
                        $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';
                        // echo "<div class='alert $class'> {$_SESSION['msg']}</div>";
                        unset($_SESSION['success']);
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <?php if (!empty($_SESSION['errors'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION['errors'] as $value): ?>
                                    <li><?= $value ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách đơn hàng</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Đơn hàng</t>
                                                            <th>Ngày tạo dơn</th>
                                                            <th>Số điện thoại</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Trạng Thái</th>
                                                            <th>ID Tài Khoản</th>
                                                            <th>Tổng tiền</th>
                                                            <th>Thao tác</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($orders as $order): ?>
                                                            <tr>
                                                                <td><?= $order['order_id']; ?></td>
                                                                <td><?= $order['created_at']; ?></td>
                                                                <td><?= $order['phone']; ?></td>
                                                                <td><?= $order['name']; ?></td>
                                                                <td><?= $order['address']; ?></td>
                                                                <td><?php
                                                                if($order['status'] == 0) {
                                                                    echo "Đơn hàng mới";
                                                                }elseif($order['status'] == 1) {
                                                                    echo "Đã xác nhận";
                                                                }elseif($order['status'] == 2) {
                                                                    echo "Đang giao hàng";
                                                                }elseif($order['status'] == 3) {
                                                                    echo "Đã nhận đơn";
                                                                }
                                                                    ?>
                                                                </td>
                                                                <td><?= $order['account_id']; ?></td>
                                                                <td><?= $order['total_amount']; ?>VNĐ</td>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">

                                                                        <a href="?act=orders/show&id=<?php echo $order['order_id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>
                                                                        <a href="?act=orders/edit&id=<?php echo $order['order_id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>
                                                                        <a href="?act=orders/delete&id=<?php echo $order['order_id']; ?>"
                                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa chứ?')"
                                                                            class="link-danger">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Modelkit Store VN.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Modelkit Store VN
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <?php require_once "views/layout/libs_js.php"; ?>
    <?php if (isset($_SESSION['message'])): ?>
        <script>
            Swal.fire({
                title: '<?php echo $_SESSION['message']['title']; ?>',
                text: '<?php echo $_SESSION['message']['text']; ?>',
                icon: '<?php echo $_SESSION['message']['icon']; ?>',
            });
            <?php unset($_SESSION['message']); ?>
        </script>
    <?php endif; ?>
</body>

</html>