<?php include "views/layouts/header.php"; ?>
<link rel="stylesheet" href="./css/single.css">
<section class="section-product">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Sản phẩm khuyến mãi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mô Hình Lắp Ráp 1/100 Norma UNX-04S Hunter Kainar A-Type 2.0 Asy-Tac Fronteer 6975231819001</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="box-img" style="height: 450px; width: 500px;">
                <img src="<?php echo $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>"
                    class="card-img-top" height="460px" >
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h1 class="tittle-product">
                    <?php echo $product['name'] ?>
                </h1>
                <div class="product-price font-weight-bold pt-2 pb-2 pl-3 pr-3 rounded">
                    <span class="special-price m-0" style="color:red">Giá: <?php echo $product['price'] ?> VNĐ</span>
                </div>
                <br>
                <form action="?act=carts" method="post">
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price'] ?>">
                            <input type="hidden" name="thumbnail" value="<?php echo $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>">
                            <input type="hidden" name="name" value="<?= $product['name']; ?>">
                            <button type="submit" name="btn-addtocart" class="btn btn-primary"><i class="bi bi-cart4"> Thêm vào giỏ hàng</i></button>
                        </form>

            </div>
            <div class="col-12 py-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="single-product-tab" data-bs-toggle="tab" data-bs-target="#single-product-tab-pane" type="button" role="tab" aria-controls="single-product-tab-pane" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment-tab-pane" type="button" role="tab" aria-controls="comment-tab-pane" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <h4>Thông tin chi tiết</h4>
                    <p><?php echo $product['content']?></p>
                </div>
            </div>
        </div>
        <br>
        <h5>Sản phẩm cùng loại</h5>
        <div class="related-product">
            <?php foreach ($product as $produc) : ?>
                <div class="card mb-4">
                <img src="images/sp1.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produc['name']; ?></h5>
                    <p class="card-text">Đẹp mà đắt vl định mệnh cuộc đời</p>
                    <a href="#" class="btn btn-primary">Mua hộ cái</a>
                </div>
            </div>
            <?php
            endforeach;
             ?>
        </div>
    </div>
</section>

<?php include "views/layouts/footer.php"; ?>