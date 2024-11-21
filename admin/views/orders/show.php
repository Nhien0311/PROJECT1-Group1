<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng | Modelkit Store VN</title>
    <?php require_once "views/layout/libs_css.php"; ?>
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
                        <h4 class="mb-sm-0">Chi tiết đơn hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                                <h4 class="card-title mb-0 flex-grow-1">Chi tiết đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                        <div class="live-preview">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Ngày tạo đơn</label>
                                                            <input type="text" class="form-control" id="created_at" name="created_at" value="<?= $orders['created_at']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="<?= $orders['phone']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $orders['name']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="address" name="address" value="<?= $orders['address']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Trạng Thái</label>
                                                            <input type="text" class="form-control" id="status" name="status" value="<?= $orders['status']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Id biến thể</label>
                                                            <input type="text" class="form-control" id="variant_id" name="variant_id" value="<?= $orders['variant_id']?>" disabled>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Mã tài khoản</label>
                                                            <input type="text" class="form-control" id="account_id" name="account_id" value="<?= $orders['account_id']?>" disabled>
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
</body>

</html>