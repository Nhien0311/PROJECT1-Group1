<?php include "views/layouts/header-cart.php"; ?>
<link rel="stylesheet" href="./css/cart.css?v=1.0">

<section class="cart py-5">
    <div class="container">
        <h2 class="tittle text-center mb-4">Giỏ hàng</h2>
      


        <div class="row justify-content-between">
            <div class="col-18 col-lg-11 col-xl-14">
                <div class="card shadow-sm p-4">
                    <div class="table-responsive" id="cart">  
                            <?= showcart() ?>
                    </div>
                    <!-- Thanh toán -->
                    <div style="text-align:right;">
                    <a href="?act=checkout" class="btn btn-primary">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#cart").on("change", ".quantity",function(){
    var sl = this.value;
    var key = $(this).next().val();
    $.post("changequantity.php",
    {
      quantity: sl,
      key: key
    },
    function(data,status){
      $("#cart").html($data); //Cập nhật giỏ hàng
    });
  });
});
</script>
