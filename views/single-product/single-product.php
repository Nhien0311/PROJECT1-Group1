<?php include "views/layouts/header.php"; ?>
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
                <form action="?act=carts" method="post">
                            <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price'] ?>">
                            <input type="hidden" name="thumbnail" value="<?= $product['thumbnail']?>">
                            <input type="hidden" name="name" value="<?= $product['name']?>">
                            <button type="submit" class="btn btn-primary" name="addToCart"><i class="bi bi-cart4"> Thêm vào giỏ hàng</i></button>
                        </form>
            </div>

        </div>

    </div>
</section>
<br>

<?php include "./views/layouts/footer.php"; ?>