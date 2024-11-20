<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sửa biến thể | Modelkit Store VN</title>
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
                                <h4 class="mb-sm-0">Quản lý biến thể</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa biến thể</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm biến thể</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=variants/edit&id=<?php echo $variant['variant_id']; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="idVariant" class="form-label">Mã sản phẩm</label>
                                                            <input type="text" class="form-control" id="idVariant" name="idVariant" 
                                                                value="<?php echo $variant['product_id']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="priceVariant" class="form-label">Giá</label>
                                                            <input type="number" class="form-control" id="priceVariant" name="priceVariant"
                                                                value="<?php echo $variant['price']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="quantityVariant" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control" id="quantityVariant" name="quantityVariant"
                                                                    value="<?php echo $variant['quantity']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="thumbnail" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="thumbnail"
                                                            name="thumbnail" accept="image/*">
                                                        <?php if ($variant['thumbnail']): ?>
                                                            <div>
                                                                <p>Ảnh hiện tại:</p>
                                                                <img src="<?php echo $variant['thumbnail']; ?>"
                                                                    style="max-width: 150px;">
                                                            </div>

                                                            <input type="hidden" name="current_image"
                                                                value="<?php echo $variant['thumbnail']; ?>">
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="statusVariant" class="form-label">Trạng thái</label>
                                                            <select class="form-select" id="statusVariant" name="statusVariant" required>
                                                                <option value="1" <?php echo ($variant['status'] == '1') ? 'selected' : ''; ?>>
                                                                    Còn hàng
                                                                </option>
                                                                <option value="0" <?php echo ($variant['status'] == '0') ? 'selected' : ''; ?>>
                                                                    Hết hàng
                                                                </option>
                                                            </select>
                                                            <div class="mt-2">
                                                                <?php
                                                                $statusClass = ($variant['status'] == '1') ? 'bg-success' : 'bg-danger';
                                                                $statusText = ($variant['status'] == '1') ? 'Còn hàng' : 'Hết hàng';
                                                                ?>
                                                                <span class="badge <?php echo $statusClass; ?> p-2"><?php echo $statusText; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="descriptionVariant" class="form-label">Mô tả</label>
                                                            <input type="text" class="form-control" id="descriptionVariant" name="descriptionVariant"
                                                            value="<?php echo $variant['description']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="nameModel" name="nameModel"
                                                                value="<?php echo $variant['name']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="reset" class="btn btn-warning">Nhập lại</button>
                                                            <button type="submit" class="btn btn-danger">Sửa sản phẩm</button>
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