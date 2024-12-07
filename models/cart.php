<?php 
<<<<<<< HEAD

function showcart_tomtat() {

=======
<<<<<<< HEAD

function showcart_tomtat() {
=======
<<<<<<< HEAD

function showcart_tomtat() {
=======
class cart {
    private $cart;
    public function __construct(){
        $this->cart = connectDB();
    }
    public function showcart_tomtat() {
>>>>>>> ediAccount
>>>>>>> bec4d1780c60d7c558224678f78922624ceec994
>>>>>>> 8cfe9e8ad5963e64d67ea18bc4c2ace1968d9e5c
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
    public function total_amount() {
        $total_amount = 0;
        foreach($_SESSION['cart'] as $item) {
            extract($item);
            $total = $quantity * $price;
            $total_amount += $total;
            var_dump($total_amount);
        }
    }
    
}
>>>>>>> ediAccount
>>>>>>> bec4d1780c60d7c558224678f78922624ceec994
>>>>>>> 8cfe9e8ad5963e64d67ea18bc4c2ace1968d9e5c
?>