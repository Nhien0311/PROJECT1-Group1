<?php include "./views/layouts/header.php"; ?>
<link rel="stylesheet" href="./css/single.css">
<section class="section-product">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?act=/" style="text-decoration: none">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product['name'] ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="box-img" style="height: 450px; width: 500px;">
                    <img src="<?php echo $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>"
                        class="card-img-top" height="460px">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h4 class="tittle-product">
                    <?php echo $product['name'] ?>
                </h4>
                <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded">
                <span class="fs-4" style="color:red">Giá: <?php echo number_format($product['price'], 0, ',', '.') ?> VNĐ</span>
                </div>
                <div class="tab-content" id="myTabContent">
                    <h5>Thông tin chi tiết</h5>
                    <textarea name="" id="" cols="80" rows="10" style="border:none" disabled><?php echo $product['content'] ?></textarea>
                </div>
                <div class="btn btn-primary"><i class="bi bi-cart4"></i> Thêm vào giỏ hàng</div>
                <div class="btn btn-warning text-white"> Mua ngay</div>
            </div>

        </div>
        <br>
        <h5>Sản phẩm khác</h5>
        <div class="related-product">
            
                <div class="card mb-4">
                    <img src="images/sp1.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Đẹp mà đắt vl định mệnh cuộc đời</p>
                    </div>
                </div>
            
        </div>
    </div>
</section>

<?php include "./views/layouts/footer.php"; ?>