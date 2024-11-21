</main>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <ul class="menu-footer">
                    <img src="./asset/images/LogoVn1.png" alt="" width="150px" height="150px">
                </ul>
                <h5>Địa chỉ: Dịch Vọng - Cầu Giấy - Hà Nội</h5>
                <h6>Email:<a href="">mungnvph52815@gmail.com</a></h6>
                <h6>Hotline:<a href="">0949441510</a></h6>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <ul class="menu-footer">
                    <h3>Chính sách</h3>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Chính sách vận chuyển</a></li>
                    <li><a href="">Chính sách đổi trả</a></li>
                    <li><a href="">Quy định sử dụng</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <h3>Map</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0245546552424!2d105.79022627400923!3d21.031703487679888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135adcdee22ad97%3A0xabcd07f2bb0deac8!2sGundamchat%20Shop!5e0!3m2!1svi!2s!4v1730191937551!5m2!1svi!2s" width="100%" height="130px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <h3>Fanpage</h3>
                <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/gundamchat24h" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=265&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fgundamchat24h&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=&amp;width="><span style="vertical-align: bottom; width: 265px; height: 130px;"><iframe name="f1aa3cae05446ef1c" width="1000px" height="1000px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v16.0/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df53695d0872ad6349%26domain%3Dgundamchat.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fgundamchat.com%252Ff0df4b775bf81113c%26relation%3Dparent.parent&amp;container_width=265&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fgundamchat24h&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=&amp;width=" style="border: none; visibility: visible; width: 265px; height: 130px;" class=""></iframe></span></div>
            </div>
            <div class="col-12 text-center py-3">
                Bản quyền thuộc về Modelkit Store VN. Cung cấp bởi Sapo.
            </div>
        </div>
    </div>
</footer>
<?php include "action-button.php"; ?>
<script src="./asset/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="./asset/slick-1.8.1/slick/slick.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('.related-product').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoSpeed: 500,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                    }
                }
            ]
        });
    })
</script>
</body>

</html>