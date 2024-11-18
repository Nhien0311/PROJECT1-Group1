<?php include "views/header-cart.php"; ?>

<section class="checkout py-3">
    <div class="container">
        <h2 class="tittle mb-4">Thanh toán</h2>
        <form class="row" id="checkoutForm">
            <div class="col-12 col-lg-7 col-xl-6">
                <div class="card">
                    <div class="card-header">Thông tin mua hàng</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="mungnvph52815@gmail.com" class="form-control" name="email" id="email" placeholder="Nhập email...">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" value="Nguyễn Văn Mừng" class="form-control" name="fullname" id="fullname" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Số điện thoại</label>
                            <input type="text" value="0949441510" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="addressName" class="form-label">Địa chỉ</label>
                            <select class="form-control name="addressName" id="">
                                <option>Hà Nội</option>
                                <option>Hà Nam</option>
                                <option>Hưng Yên</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin đơn hàng
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Thêm ghi chú</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
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
                            <tr>
                                <td scope="row">Robo Trái Cây</td>
                                <td>450.000đ</td>
                                <td>450.000đ</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Tạm tính: </td>
                                <td>450.000đ</td>
                            </tr>
                            <tr>
                                <td scope="row">Phí vận chuyển: </td>
                                <td>30.000đ</td>
                            </tr>
                            <tr>
                                <td scope="row">Tổng cộng: </td>
                                <td>480.000đ</td>
                            </tr>
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
                                <td scope="row"><input type="radio" name="money"> </td>
                                <td>Thanh toán bằng tiền mặt</td>
                            </tr>
                            <tr>
                                <td scope="row"><input type="radio" name="money"> </td>
                                <td>Thanh toán bằng thẻ tín dụng hoặc thẻ ghi nợ</td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                </div>
            </div>
        </form>
    </div>
</section>
<br>
<?php include "views/footer.php"; ?>