<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách biến thể| Modelkit Store VN</title>
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
                                <h4 class="mb-sm-0">Danh sách biến thể</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách biến thể</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách biến thể</h4>
                                        <a href="?act=variants/create" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm biến thể
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-nowrap align-middle mb-0 table text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col">Mã sản phẩm</th>
                                                            <th scope="col">Giá</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Hình ảnh</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 1;
                                                        foreach ($variants as $variant): ?>
                                                            <tr>
                                                                <td><?php echo $stt++; ?></td>
                                                                <td><?php echo $variant['product_id']; ?></td>
                                                                <td><?php echo $variant['category_id']; ?></td>
                                                                <td><?php echo $variant['price']; ?> VNĐ</td>
                                                                <td><?php echo $variant['quantity']; ?></td>
                                                                <td>
                                                                    <img src="<?php echo $variant['thumbnail'] ? $variant['thumbnail'] : 'default-image.png'; ?>"
                                                                        class="rounded" width="50" height="50">
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($variant['status'] == '1') { ?>
                                                                        <span class="badge bg-success">Còn hàng</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-danger">Hết hàng</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-center hstack gap-3 flex-wrap">

                                                                        <a href="?act=variants/show&id=<?php echo $variant['variant_id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-eye-line"></i>
                                                                        </a>

                                                                        <a href="?act=variants/edit&id=<?php echo $variant['variant_id']; ?>"
                                                                            class="link-success">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>

                                                                        <a href="?act=variants/delete&id=<?php echo $variant['variant_id']; ?>"
                                                                            class="link-danger"
                                                                            onclick="return confirm('Bạn có chắc chắn xóa không?');">
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
</body>

</html>