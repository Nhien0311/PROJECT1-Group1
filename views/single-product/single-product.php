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
                            <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                            <input type="input" name="quantity" value="1">
                          
                            <button type="submit" class="btn btn-primary" name="addToCart"><i class="bi bi-cart4"> Thêm vào giỏ hàng</i></button>
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
                    <li class="nav-item" rolclasse="presentation">
                        <button  id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <h4>Thông tin chi tiết</h4>
                    <p><?php echo $product['content']?></p>
                </div>
            </div>
        </div>
        <br>
     
    </div>
</section>

<?php include "views/layouts/footer.php"; ?>