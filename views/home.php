<?php include "./views/layouts/header.php"; ?>
<?php include "./views/layouts/slide.php"; ?>
<div class="container">
    <div class="section-product py-5">
        <h4 class="tittle-section">Sản phẩm mới nhất</h4>
        <div class="row">
        <?php foreach($products as $product): ?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card mb-4" >
                   <a href="?act=single-product/show&id=<?= $product['product_id']?>"><img src="<?php echo $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>"
                    class="card-img-top" width="250" height="auto" ></a>
                        <div class="card-body">
                            <h6 class="card-title"><?= $product['name']; ?></h6>
                            <p class="card-text" style="color:red"><strong><?php echo number_format($product['price'], 0, ',', '.') ?> VNĐ</strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include "./views/layouts/footer.php"; ?>


    