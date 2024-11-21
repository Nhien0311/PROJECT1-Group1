<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-light">
        <span class="logo-lg mt-4">
                <h3 class="display-7 mt-4" style="color: #ffffff !important; display: inline;">Modelkit Store </h3>
                <h3 class="display-7 mt-4" style="color: #ff0000 !important; display: inline;">VN</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=/">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Trang chủ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSanPham" data-bs-toggle="collapse" role="button" 
                        aria-expanded="false" aria-controls="sidebarSanPham">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSanPham">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=products" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button" 
                        aria-expanded="false" aria-controls="sidebarDanhMuc">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=categories" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTaikhoan" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTaikhoan">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí tài khoản</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTaikhoan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=accounts" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarQuanLi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarQuanLi">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí đánh giá</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarQuanLi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=ratings" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBienThe" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBienThe">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí biến thể</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBienThe">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=variants" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarQuanLi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarQuanLi">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarQuanLi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=orders" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarQuanLi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarQuanLi">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Quản lí đơn hàng chi tiết</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarQuanLi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=order_details" class="nav-link" data-key="t-sweet-alerts">
                                    Danh sách
                                </a>
                            </li>
                          
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>