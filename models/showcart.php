<?php
function showcart() {
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bec4d1780c60d7c558224678f78922624ceec994
>>>>>>> 8cfe9e8ad5963e64d67ea18bc4c2ace1968d9e5c
    if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
        $html_cart = '
        <a href="?act=carts&emptyCart=1">Xóa rỗng giỏ hàng</a>
        <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center"><input type="checkbox" name="" id=""></th>
                                <th scope="col" colspan="2">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tạm tính</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>';
        $total_amount = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            extract($item);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
    if (isset($_SESSION['cart'])&& (count($_SESSION['cart']) > 0)) {
        $html_cart ='  
        <a href="?act=carts&emptycart=1">Xóa rỗng giỏ hàng</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center"><input type="checkbox" name="" id=""></th>
                                    <th scope="col" colspan="2">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tạm tính</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>';
        $total_amount = 0; 
        foreach ($_SESSION['cart'] as $key => $item) {
            $name = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
            $price = $item['price'];
            $quantity = $item['quantity'];
            $thumbnail = htmlspecialchars($item['thumbnail'], ENT_QUOTES, 'UTF-8');         
>>>>>>> ediAccount
>>>>>>> bec4d1780c60d7c558224678f78922624ceec994
>>>>>>> 8cfe9e8ad5963e64d67ea18bc4c2ace1968d9e5c
            $total = $price * $quantity;
            $total_amount += $total;
            $html_cart .= '<tr>
                                <td class="text-center"><input type="checkbox" name="" id=""></td>
                                <td><img src="' . $thumbnail . '"></td>

                                <td>' . $name . '</td>
                                <td>' . number_format($price, 0, ',', '.') . ' đ</td>
                                <td>
                                    <div class="input-group input-cart mb-3">
                                        <input type="number" class="form-control quantity" value="' . $quantity . '"
                                            min="1" max="10">
                                        <input type="hidden" class="form-control" value="' . $key . '">
                                    </div>
                                </td>
                                <td>' .number_format($total, 0, ',', '.'). ' đ</td>
                                <td class="text-center">
                                <a href="?act=carts&delkey=' . $key . '">
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Xóa</button>
                                    </a>
                                </td>
                            </tr>';
        }
        $html_cart .= ' <tr>
                                <td colspan="2"><strong>Tổng cộng:</strong></td>
                                <td colspan="5"><strong>'.number_format($total_amount, 0, ',', '.').' đ</strong></td>
                            </tr>
                        </tbody>

                    </table>';
    } else {
        $html_cart = 'Giỏ hàng của bạn đang trống!
        <br>
    <a href="?act=/" class="btn btn-secondary">Tiếp tục mua sắm</a>';
    }
    return $html_cart;
}

?>