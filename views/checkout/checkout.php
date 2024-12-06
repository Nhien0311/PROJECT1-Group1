<?php include "views/layouts/header-cart.php"; ?>

<section class="checkout py-3">
    <div class="container">
        <h2 class="tittle mb-4">Thanh toán</h2>
        <form action="?act=checkout" method="post" class="row" id="checkoutForm">
            <div class="col-12 col-lg-7 col-xl-4">
                <div class="card">
                    <div class="card-header">Thông tin người đặt hàng</div>
                    <!-- Khi user đăng nhập thì load thông tin lên đây -->
                    <div class="card-body">
                    <?php
                    if(isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['user_name'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $phone = $_SESSION['user']['phone'];
                    } else {
                        echo "Bạn chưa đăng nhập tài khoản!";
                        header('Location:?act=login');
                        exit;
                    }
                    ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên*</label>
                            <input type="text" value="<?= $name ?>" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" value="<?= $email ?>" class="form-control" name="email" id="email" placeholder="Nhập email...">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại*</label>
                            <input type="number" value="<?= $phone ?>" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ*</label>
                            <input type="text" value="<?= $address ?>" class="form-control" name="address" id="address" placeholder="Nhập số địa chỉ">
                            </select>
                        </div>
                    </div>
                </div>
            </div>

       
            <div class="col-12 col-lg-5 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        Thông tin đơn hàng
                    </div>
                    <div class="card-body">

                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= showcart_tomtat() ?>                        
                        </tbody>
                    </table>
                
                    <table class="table">
                    <thead>
                            <tr>
                                <th scope="col" colspan="2">Phương thức thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><input type="radio" name="method" value="1" checked> </td>
                                <td>Thanh toán bằng tiền mặt</td>
                            </tr>
                            <tr>
                                <td scope="row"><input type="radio" name="method" value="2"> </td>
                                <td>Ví điện tử: Momo</td>
                            </tr>
                            <tr>
                                <td scope="row"><input type="radio" name="method" value="3"> </td>
                                <td>Chuyển khoản</td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" name="dongythanhtoan" class="btn btn-primary">Đồng ý thanh toán</button>
                </div>
            </div>

            
        </form>
    </div>
</section>
<br>
<?php include "views/layouts/footer.php"; ?>

