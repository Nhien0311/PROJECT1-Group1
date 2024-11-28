<?php include "views/layouts/header.php"; ?>
<link rel="stylesheet" href="./css/cart.css">
<section class="cart py-3">
    <div class="container">
        <h2 class="tittle">
            Giỏ hàng
        </h2>
        
        <div class="row">
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;"><input type="checkbox" name="" id=""></th>
                                    <th scope="col" colspan="2">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tạm tính</th>
                                    <th scope="col">Thao tác</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($_SESSION['myCart'] as $pro) : ?>
                                    <tr>
                                        <th scope="col" style="text-align: center;"><input type="checkbox" name="" id=""></th>
                                        <td>
                                            <img src="<?= $pro['thumbnail'] ?>" alt="" height="45px">
                                        </td>
                                        <td><?=  $pro['name'] ?></td>
                                        <td><?=  $pro['price'] ?></td>
                                        <td>
                                            <div class="input-group input-cart mb-3">
                                                <button class="btn btn-outline-secondary" type="button">-</button>
                                                <input type="number" value="1" min="1" max="10" class="form-control">
                                                <button class="btn btn-outline-secondary" type="button">+</button>
                                            </div>
                                        </td>
                                        <td><?=  $pro['price'] ?></td>
                                        <th scope="row"><button class="btn rounded-circle btn-danger"><i class="bi bi-trash3"></i></button></th>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Đơn giá: </td>
                                <td><?=  $pro['total_amount'] ?>VNĐ</td>
                            </tr>
                            <tr>
                                <td scope="row">Phí vận chuyển: </td>
                                <td>30.000đ</td>
                            </tr>
                            <tr>
                                <td scope="row">Tổng thanh toán: </td>
                                <td><?=  $pro['total_amount'] ?>VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="?act=checkout"></form>
                    <button class="btn btn-primary">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "./views/layouts/footer.php"; ?>
