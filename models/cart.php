<?php 

function showcart_tomtat() {

        if (!empty($_SESSION['cart'])) {
            $html_cart = '';
            $total_amount = 0;
            foreach ($_SESSION['cart'] as $item) {
                extract($item);
                $total=$quantity*$price;
                $total_amount+=$total;
                $html_cart.=' <tr>
                                <td scope="row">'.$name.'</td>
                                <td >'.$quantity.'</td>
                                 <td>' .number_format($price, 0, ',', '.') . ' đ</td>
                                </tr>
                           ';
            }
            $html_cart .= ' <tr>
                                <td><strong>Tổng đơn hàng: </strong></td>
                                <td></td>
                                <td class="col-2" style="color:red;"><strong>'.number_format($total_amount, 0, ',', '.') . ' đ</strong></td>
                                <input type="hidden" name="tongdonhang" value="'.$total_amount.'">
                            </tr>
                    ';
        } else {
            $html_cart='Giỏ hàng không tồn tại';
        }
        return $html_cart;
    }
?>