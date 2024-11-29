<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Cập nhật chi tiết đơn hàng | Modelkit Store Vn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    require_once "views/layout/libs_css.php";
    ?>
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
                                <h4 class="mb-sm-0">Cập nhật chi tiết đơn hàng</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật chi tiết đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật chi tiết đơn hàng</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=order_details/edit&id=<?php echo $order_details['order_detail_id']; ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="quantity" class="form-label">Số lượng</label>
                                                            <input type="text" class="form-control" id="quantity" name="quantity"
                                                                value="<?php echo $order_details['quantity']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="variant_id" class="form-label">ID biến thể</label>
                                                            <input type="text" class="form-control" id="variant_id" name="variant_id"
                                                                value="<?php echo $order_details['variant_id']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="account_id" class="form-label">ID tài khoản</label>
                                                            <input type="text" class="form-control" id="account_id" name="account_id"
                                                                value="<?php echo $order_details['account_id']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="created_at" class="form-label">Ngày tạo đơn</label>
                                                            <input type="text" class="form-control" id="created_at" name="created_at"
                                                                value="<?php echo $order_details['created_at']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="method_id" class="form-label">Phương thức thanh toán</label>
                                                            <input type="text" class="form-control" id="method" name="method_id"
                                                                value="<?php echo $order_details['method']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="total_amount" class="form-label">Tổng tiền</label>
                                                            <input type="text" class="form-control" id="total_amount" name="total_amount"
                                                                value="<?php echo $order_details['total_amount']; ?>" required>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-danger">Cập nhật đơn hàng chi tiết</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <a href="?act=order_details" class="btn btn-primary">Quay lại</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <?php
    require_once "views/layout/libs_js.php";
    ?>
</body>

</html>