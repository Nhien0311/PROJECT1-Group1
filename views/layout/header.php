<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex align-items-center">
                <div class="dropdown ms-sm-3 header-item topbar-user">

                    <header id="page-topbar">
                        <div class="layout-width">
                            <div class="navbar-header">
                                <div class="d-flex">

                                    <button type="button"
                                        class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                                        id="topnav-hamburger-icon">
                                        <span class="hamburger-icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="ms-1 header-item d-none d-sm-flex">
                                        <button type="button"
                                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                            data-toggle="fullscreen">
                                            <i class='bx bx-fullscreen fs-22'></i>
                                        </button>
                                    </div>
                                    <div class="ms-1 header-item d-none d-sm-flex">
                                        <button type="button"
                                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                                            <i class='bx bx-moon fs-22'></i>
                                        </button>
                                    </div>

                                    <div class="dropdown ms-sm-3 header-item topbar-user">
                                        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="d-flex align-items-center">
                                                <img class="rounded-circle header-profile-user"
                                                    src="https://static.vecteezy.com/system/resources/thumbnails/012/210/707/small_2x/worker-employee-businessman-avatar-profile-icon-vector.jpg"
                                                    alt="Header Avatar">
                                                <span class="text-start ms-xl-2">
                                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">

                                                    </span>
                                                </span>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <h6 class="dropdown-header">Welcome! <?= $_SESSION['user']['user_name'] ?? '' ?></h6>
                                            <?php if (isset($_SESSION['user'])) : ?>
                                                <a class="dropdown-item" href="pages-profile.html">
                                                    <span class="align-middle">Tài khoản</span></a>
                                                <a class="dropdown-item" href="?act=logout">
                                                     <span class="align-middle" data-key="t-logout">Đăng xuất</span></a>
                                            <?php else : ?>
                                                <a class="dropdown-item" href="?act=login">
                                                    <span class="align-middle">Đăng nhập</span></a>
                                                <a class="dropdown-item" href="?act=register">
                                                     <span class="align-middle" data-key="t-logout">Đăng ký</span></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

                </div>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</header>