<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm sản phẩm | Modelkit Store VN</title>
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
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                            <?php foreach($_SESSION['errors'] as $value): ?>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=products/create" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nameModel" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="nameModel" name="nameModel" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="categoryModel" class="form-label">Danh mục</label>
                                                            <select class="form-select" id="categoryModel" name="categoryModel" required>
                                                                <?php foreach($categories as $category) : ?>
                                                                <option value="<?php echo $category['category_id']; ?>">
                                                                <?php echo $category['name']; ?></option>
                                                                
                                                                <?php
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="imageModel" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="imageModel" name="thumbnail" accept="image/*" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="descriptionModel" class="form-label">Mô tả</label>
                                                            <textarea rows="5" cols="5" class="form-control" id="descriptionModel" name="descriptionModel" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="contentModel" class="form-label">Nội dung</label>
                                                            <textarea rows="5" cols="5" class="form-control" id="contentModel" name="contentModel"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="statusModel" class="form-label">Trạng thái</label>
                                                            <select class="form-select" id="statusModel" name="statusModel" required>
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Còn hàng</option>
                                                                <option value="2">Hết hàng</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="sale_priceModel" class="form-label">Giá khuyến mãi</label>
                                                            <input type="number" class="form-control" id="sale_priceModel" name="sale_priceModel" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="priceModel" class="form-label">Giá</label>
                                                            <input type="number" class="form-control" id="priceModel" name="priceModel" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="priceModel" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <a href="?act=products" class="btn btn-primary">Quay lại</a>
                                                            <button type="reset" class="btn btn-warning">Nhập lại</button>
                                                            <button type="submit" class="btn btn-danger">Thêm sản phẩm</button>
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