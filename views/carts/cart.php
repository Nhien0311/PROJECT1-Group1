<?php include "views/layouts/header-cart.php"; ?>
<link rel="stylesheet" href="./css/cart.css?v=1.0">

<section class="cart py-5">
    <div class="container">
        <h2 class="tittle text-center mb-4">Giỏ hàng</h2>
      
        <?php
        // var_dump($_SESSION['myCart']);die;
        if (isset($_SESSION['myCart'])&& (count($_SESSION['myCart']) > 0)) {
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
            foreach ($_SESSION['myCart'] as $key => $item) {
                extract($item);
                $html_cart .= '<tr>
                                <td class="text-center"><input type="checkbox" name="" id=""></td>
                                <td><img src="./uploads/' . $thumbnail . '" alt="" class="img-fluid"></td>
                                <td>' . $name . '</td>
                                <td>' . (isset($price) && is_numeric($price) ? number_format($price, 0, ',', '.') : '0 ') . 'VNĐ</td>
                                <td>
                                    <div class="input-group input-cart mb-3">
                                        <input type="number" value="' . $quantity . '" min="1" max="10" class="form-control">
                                    </div>
                                </td>
                               <td>' . (isset($price) && is_numeric($price) ? number_format($price, 0, ',', '.') : '0 ') . 'VNĐ</td>
                                <td class="text-center">
                                <a href="?act=carts&delkey=' . $key . '"
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Xóa</button>
                                </a>
                                </td>
                            </tr>';
            }
            $html_cart .= '<tr>
                            <td colspan="5" class="text-end"><strong>Tổng cộng:</strong></td>
                            <td><strong>1,000,000 VNĐ</strong></td>
                        </tr>
                    </tbody>
                    </table>';
        } else {
            $html_cart = 'Giỏ hàng của bạn đang trống! 
            <br>
            <a href="?act=/" class="btn btn-secondary">Tiếp tục mua sắm</a>';
        }
        ?>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="card shadow-sm p-4">
                    <div class="table-responsive">
                      
                            <?= $html_cart ?>

                    </div class="">
                        <button href="?act=checkout" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "./views/layouts/footer.php"; ?>