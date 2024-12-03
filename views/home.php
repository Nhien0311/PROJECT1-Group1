<?php include "./views/layouts/header.php"; ?>
<?php include "./views/layouts/slide.php"; ?>
<div class="container">
    <div class="section-product py-5">
        <h1 class="tittle-section">Sản phẩm tìm kiếm</h1>

        <!-- Hiển thị thông báo nếu có -->
        <?php if (!empty($message)): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach($products as $product): ?>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card mb-4">
                            <a href="?act=single-product/show&id=<?= $product['product_id'] ?>">
                                <img src="<?= $product['thumbnail'] ? $product['thumbnail'] : 'default-image.png'; ?>" 
                                     class="card-img-top" width="250" height="auto">
                            </a>
                            <div class="card-body">
                                <h6 class="card-title"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></h6>
                                <p class="card-text" style="color:red">
                                    <strong><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">Không có sản phẩm nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "./views/layouts/footer.php"; ?>