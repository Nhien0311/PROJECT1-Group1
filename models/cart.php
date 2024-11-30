<?php 
class cart {
    private $cart;
    public function __construct(){
        $this->cart = connectDB();
    }
    public function showcart_tomtat() {
        if (!empty($_SESSION['myCart'])) {
            $html_cart = '';
            foreach ($_SESSION['myCart'] as $item) {
                extract($item);
                $total_amount+=$quantity*$price;
                $html_cart.=' <tr>
                                <td scope="row">'.$name.'</td>
                                <td >'.$quantity.'</td>
                                 <td>' .number_format($price, 0, ',', '.') . ' VNĐ</td>
                                
                           ';
            }
            $html_cart .= ' <tr>
                                <td><strong>Tổng đơn hàng: </strong></td>
                                <td></td>
                                <td class="col-2" style="color:red;"><strong>'.number_format($total_amount, 0, ',', '.') . ' VNĐ</strong></td>
                                <input type="hidden" name="tongdonhang" value="'.$total_amount.'">
                            </tr>
                    ';
        } else {
            $html_cart='Giỏ hàng không tồn tại';
        }
        return $html_cart;
    }
}
?>