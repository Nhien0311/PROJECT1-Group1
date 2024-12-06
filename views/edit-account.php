<?php include "./views/layouts/header.php"; ?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?act=/" style="text-decoration: none">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-6">
            <div class="card-header">
                <h3>Thông tin tài khoản</h3>
            </div>
            <form action="?act=edit-inforPersonal" method="post">

                <div class="card">
                    <div class="card-body">
                        <input type="text" name="account_id" id="" value="<?= $infor['account_id'] ?>" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" value="<?= $infor['user_name'] ?>" class="form-control" name="user_name" id="name" placeholder="Nhập họ và tên">
                            <?php if (isset($_SESSION['errors']['user_name'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['user_name'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="<?= $infor['email'] ?>" class="form-control" name="email" id="email" placeholder="Nhập email">
                            <?php if (isset($_SESSION['errors']['email'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="number" value="<?= $infor['phone'] ?>" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                            <?php if (isset($_SESSION['errors']['phone'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" value="<?= $infor['address'] ?>" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                            <?php if (isset($_SESSION['errors']['address'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['address'] ?></p>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </div>

            </form>
        </div>


        <div class="col-md-6">
            <div class="card-header">
                <h3>Sửa mật khẩu</h3>
            </div>

            <form action="?act=edit-pass" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="old-pass" class="form-label">Mật khẩu cũ</label>
                            <input type="password" value="" class="form-control" name="old-pass" id="old-pass" placeholder="Mật khẩu cũ">
                            <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="new-pass" class="form-label">Mật khẩu mới</label>
                            <input type="password" value="" class="form-control" name="new-pass" id="new-pass" placeholder="Mật khẩu mới">
                            <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-pass" class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="pass" value="" class="form-control" name="confirm-pass" id="confirm-pass" placeholder="Nhập lại mật khẩu mới">
                            <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
                                <p class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include "./views/layouts/footer.php"; ?>