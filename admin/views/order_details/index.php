<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chi tiết đơn hàng | Modelkit Store VN</title>
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
                                <h4 class="mb-sm-0">Danh sách chi tiết đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách chi tiết đơn hàng</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách chi tiết đơn hàng</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">ID sản phẩm</th>
                                                            <th scope="col">Ảnh sản phẩm</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Id đơn hàng</th>
                                                            <th scope="col">Tổng tiền</th>
                                                            <th scope="col">Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($order_details as $order_detail): ?>
                                                            <tr>
                                                                <td><?= $order_detail['order_detail_id'] ?></td>
                                                                <td><?= $order_detail['quantity'] ?></td>
                                                                <td><?= $order_detail['product_id'] ?></td>
                                                                <td><img src="<?= $order_detail['thumbnail'] ? $order_detail['thumbnail'] : 'default-image.png'; ?>"
                                                                class="rounded" width="50" height="50"></td>
                                                                <td><?= $order_detail['name'] ?></td>
                                                                <td><?= $order_detail['order_id'] ?></td>
                                                                <td><?= $order_detail['total_amount'] ?></td>
                                                                <td>
                                                                <div
                                                                    class="d-flex justify-content-center hstack gap-3 flex-wrap">

                                                                    <a href="?act=order_details/show&id=<?php echo $order_detail['order_detail_id']; ?>"
                                                                        class="link-success">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                    <a href="?act=order_details/edit&id=<?php echo $order_detail['order_detail_id']; ?>" class="link-success">
                                                                        <i class="ri-edit-2-line"></i>
                                                                    </a>
                                                                    <a href="?act=order_details/delete&id=<?php echo $order_detail['order_detail_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa chứ?')" class="link-danger">
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