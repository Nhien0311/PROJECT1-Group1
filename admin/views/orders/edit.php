<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Cập nhật đơn hàng | Modelkit Store Vn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php
    require_once "views/layout/libs_css.php";
    ?>
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
                                <h4 class="mb-sm-0">Cập nhật đơn hàng</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['success'])) {
                        $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';
                        echo "<div class='alert $class'> {$_SESSION['msg']}</div>";
                        unset($_SESSION['success']);
                        unset($_SESSION['msg']);
                    }
                    ?>
                      <?php
                    if (!empty($_SESSION['errors'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION['errors'] as $value): ?>
                                    <li><?= $value ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật đơn hàng</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=orders/edit&id=<?php echo $orders['order_id']; ?>"
                                                method="POST">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="created_at" class="form-label">Ngày tạo
                                                                đơn</label>
                                                            <input type="text" class="form-control" id="created_at"
                                                                name="created_at"
                                                                value="<?php echo $orders['created_at']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" value="<?php echo $orders['phone']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="<?php echo $orders['name']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" value="<?php echo $orders['address']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng Thái</label>
                                                            <select class="form-select" id="status" name="status" required>
                                                                <option value="0" <?php echo ($orders['status'] == '0') ? 'selected' : ''; ?>>
                                                                    Đơn hàng mới
                                                                </option>
                                                                <option value="1" <?php echo ($orders['status'] == '1') ? 'selected' : ''; ?>>
                                                                    Đã xác nhận
                                                                </option>
                                                                <option value="2" <?php echo ($orders['status'] == '2') ? 'selected' : ''; ?>>
                                                                    Đang giao hàng
                                                                </option>
                                                                <option value="3" <?php echo ($orders['status'] == '3') ? 'selected' : ''; ?>>
                                                                    Đã nhận đơn
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="variant_id" class="form-label">ID biến
                                                                thể</label>
                                                            <input type="text" class="form-control" id="variant_id"
                                                                name="variant_id"
                                                                value="<?php echo $orders['variant_id']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Id tài
                                                                khoản</label>
                                                            <input type="text" class="form-control" id="account_id"
                                                                name="account_id"
                                                                value="<?php echo $orders['account_id']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="total_amount" class="form-label">Tổng tiền</label>
                                                            <input type="text" class="form-control" id="total_amount"
                                                                name="total_amount"
                                                                value="<?php echo $orders['total_amount']; ?>" required>

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-danger">Cập nhập đơn
                                                                hàng</button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <a href="?act=accounts" class="btn btn-primary">Quay lại</a>
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