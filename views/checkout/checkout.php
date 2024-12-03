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
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và *</label>
                            <input type="text" value="Nguyễn Văn Mừng" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" value="mungnvph52815@gmail.com" class="form-control" name="email" id="email" placeholder="Nhập email...">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại*</label>
                            <input type="text" value="0949441510" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ*</label>
                            <input type="text" value="Hà Nội" class="form-control" name="address" id="address" placeholder="Nhập số địa chỉ">
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
                            <?= $thongtingiohang ?>
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
                                <td scope="row"><input type="radio" id="payment_check" name="methodpayment" value="Tiền mặt" checked> </td>
                                <td>Thanh toán bằng tiền mặt</td>
                            </tr>
                            <tr>
                                <td scope="row"><input type="radio" id="payment_bank" name="methodpayment" value="Momo"> </td>
                                <td>Ví điện tử: Momo</td>
                            </tr>
                            <tr>
                                <td scope="row"><input type="radio" id="payment_card" name="methodpayment" value="Chuyển khoản"> </td>
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

