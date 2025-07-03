<header class="row background-header">

    <div class="col-8">
        <a href="?page=home">
            <img src="image/logo-h.png" class="ms-2" style="width:180px" />
        </a>
    </div>
    <div class="col-4 d-flex align-items-center row">
        <div class="col">
            <form class="input-group mb-3" action="#" method="get">
                <input class="form-control" type="text" name="q" placeholder="Tìm kiếm...">
                <button class="input-group-text" for="">
                    <i class="ti-search"></i>
                </button>
            </form>

        </div>
        <?php
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        if (!isset($_SESSION["username"]) || $_SESSION["username"] === "") {
            echo " 
            <div class='col d-flex align-items-center'>
                <a href='?page=login' class='fw-bold text-decoration-none mb-3 font-login'>Đăng nhập</a>
            </div>";
        } else {

            $username = $_SESSION["username"];
            echo "
            <div class='col d-flex align-items-center'>
                <h5>$username</h5>
            </div>
            <div class='col d-flex align-items-center'>
                <a href='?logout=true' class='fw-bold text-decoration-none mb-3 font-login'>Đăng xuất</a>
            </div>
            ";
        }
        ?>
    </div>
</header>
<nav class="bg-nav">
    <ul class="row list-unstyled text-center">
        <li class="col text-decoration-none"><a class="text-decoration-none" href="?page=home">Trang chủ</a></li>
        <li class="col text-decoration-none"><a class="text-decoration-none dropdown-toggle" role="button"
                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="#">Sản phẩm</a>
            <ul class="list-unstyled dropdown-menu">
                <li><a class="text-decoration-none dropdown-item" href="?page=sanpham&type=camera">Camera</a></li>
                <li><a class="text-decoration-none dropdown-item" href="?page=sanpham&type=monitor">Màn hình</a></li>
                <li><a class="text-decoration-none dropdown-item" href="?page=sanpham&type=keyboard">Bàn phím</a></li>
                <li><a class="text-decoration-none dropdown-item" href="?page=sanpham&type=mouse">Chuột</a></li>
            </ul>
        </li>
        <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Tin tức</a></li>
        <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Liên hệ</a></li>
        <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Hỗ trợ</a></li>
    </ul>
</nav>
<?php

if (isset($_GET['logout'])) {
    session_unset();      // Xoá tất cả biến session
    session_destroy();    // Hủy session
    header("Location: ?page=home");
    exit();
}
?>