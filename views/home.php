<?php include "./views/layouts/header.php"; ?>
<?php include "./views/layouts/slide.php"; ?>
<div class="container">
    <div class="section-product py-5">
        <h1 class="tittle-section">Sản phẩm mới nhất</h1>
        <div class="row">
        <?php foreach($products as $product): ?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card mb-4">
                   <a href=""><img src="<?php echo $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>" class="card-img-top" width="250" height="250" ></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text" style="color:red"><strong>Giá: <?= $product['price'] ?>VNĐ</strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include "./views/layouts/footer.php"; ?>


    