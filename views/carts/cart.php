<?php include "views/layouts/header.php"; ?>
<link rel="stylesheet" href="./css/cart.css">
<section class="cart py-5">
    <div class="container">
        <h2 class="tittle"> Giỏ hàng</h2>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-8 col-xl-12">
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
<?php include "./views/layouts/footer.php"; ?>
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