<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="./asset/slick-1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./asset/slick-1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./asset/images/LogoVn1.png" alt="" height="150px" width="150px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrime"
                    aria-controls="navbarPrime" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarPrime" style="justify-content: space-between;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Khuyến mãi hot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Sản phẩm <i class="bi bi-caret-down-fill"></i></a>
                            <ul class="sub-menu">
                                <li><a href="">Transformers</a></li>
                                <li><a href="">Gundam</a></li>
                                <li><a href="">Figure Rise Standard</a></li>
                                <li><a href="">Kotobukiya</a></li>
                            </ul>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" method="GET" action="<?php echo DOMAIN; ?>">
                        <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm...">
                       
                        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                    </form>



                </div>
            </div>
        </nav>
    </header>
    <main>