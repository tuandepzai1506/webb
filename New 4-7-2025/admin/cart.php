<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Lấy dữ liệu giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Tính tổng giá trị giỏ hàng
function format_price($price)
{
    return number_format($price, 0, '', '.') . '₫';
}

$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

if (isset($_POST['update_cart'])) {
    $keys = $_POST['keys'] ?? [];
    $quantities = $_POST['quantities'] ?? [];

    foreach ($keys as $index => $key) {
        $qty = max(1, (int) $quantities[$index]); // Không cho nhỏ hơn 1
        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity'] = $qty;
        }
    }

    // Sau khi cập nhật, refresh lại trang
    header("Location: cart.php");
    exit;
}

if (isset($_POST['remove_item'])) {
    $key = $_POST['remove_key'];
    if (isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
    }
    // Load lại trang để cập nhật hiển thị
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>HEARTECH - Giỏ hàng</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        header {
            background-color: #f8f4f1;
            color: #944473;
            padding: 20px 200px;
            padding-bottom: 0;
            /*text-align: center;*/
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .left-header {
            display: flex;
            align-items: center;
        }

        .right-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .separator {
            /*Cái bên cạnh nút đăng kí*/
            width: 1px;
            height: 24px;
            background-color: #ccc;
        }

        .login-btn {
            color: #944473;
            padding: 6px 12px;
            border: 1px solid #944473;
            border-radius: 20px;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color: white;
            color: #944473;
        }

        .search-form {
            border: 1px solid #944473;
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .search-form input[type="text"] {
            border: none;
            padding: 8px;
            outline: none;
            width: 180px;
        }

        .search-form button {
            background-color: white;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        nav {
            background-color: #f8f4f1;
            /*margin: 5px 10%;*/
            font-weight: bold;
        }

        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav>ul li {
            list-style: none;
        }

        nav>ul li a {
            padding: 0 25px;
            display: block;
            line-height: 50px;
            color: #944473;
            /*text-decoration: none;*/
        }

        nav a:visited {
            color: #944473;
        }

        nav a:hover {
            opacity: .7;
            background: #ffffff;
            color: #1a1a1a;
        }

        nav li ul {
            display: none;
            min-width: 350px;
            position: absolute;
        }

        nav li>ul li {
            width: 100%;
            border: none;
            border-bottom: 1px solid #ccc;
            background: #f8f4f1;
            text-align: left;
        }

        nav li:hover>ul {
            display: block;
        }

        section {
            justify-content: center;
            font-family: 'Roboto', sans-serif;
        }

        footer {
            font-size: small;
            color: #944473;
            background-color: #f8f4f1;
        }

        .footer-content {
            padding: 20px 200px;
            display: flex;
            justify-content: space-between;
        }

        .footer-social {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .footer-social ul {
            display: flex;
            gap: 15px;
        }

        .footer-social ul li {
            list-style-type: none;
            padding: 8px 0;
        }

        .separator-hori {
            /*Cái bên cạnh nút đăng kí*/
            width: 50px;
            height: 1px;
            background-color: #ccc;
        }

        .copyright {
            text-align: center;
            background-color: #1a1a1a;
            color: white;
            padding: 1px;
        }

        a {
            text-decoration: none;
        }

        .main {
            display: flex;
            flex-direction: column;
            /* xếp theo hàng dọc */
            align-items: center;
            /* căn giữa theo chiều ngang */
            justify-content: center;
            /* căn giữa theo chiều dọc nếu muốn */
            gap: 30px;
            margin: 30px;
        }

        .cart-review {
            display: flex;
            flex-direction: row;
            gap: 30px;
        }

        .product-infor {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0px 20px 20px 20px;
        }

        .bill-total {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 20px 20px 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .pair {
            display: flex;
            justify-content: center;
        }

        .product-infor img {
            width: 100px;
            height: auto;
        }

        .product-infor input {
            width: 40px;
            text-align: center;
            align-items: center;
            height: 31px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
        }

        .remove-btn {
            color: red;
            cursor: pointer;
            border: none;
            background-color: white;
        }

        .subtotal,
        .shipping {
            display: flex;
            justify-content: space-between;
        }

        .shipping p {
            flex: 1;
        }

        .shipping .noti {
            text-align: right;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
            justify-content: space-between;
            display: flex;
        }

        .checkout {
            margin-top: 20px;
            width: 100%;
            background-color: #000;
            color: white;
            padding: 12px;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!--HEADER-->
    <header>

        <div class="left-header">
            <a href="./home.php">
                <img class="logo" src="../image/logo.png" alt="" width="200" height="50">
            </a>
        </div>

        <div class="right-header">
            <form class="search-form" action="#" method="get">
                <input type="text" name="q" placeholder="Tìm kiếm...">
                <button type="submit">🔍</button>
            </form>

            <div class="separator"></div>

            <a href="#" class="login-btn"><?= $_SESSION["username"] ?></a>

            <a href="../logout.php" class="login-btn">Đăng xuất</a>
        </div>

    </header>

    <!--MENU-->
    <nav>
        <ul>
            <li><a href="./home.php">Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a>
                <ul>
                    <li><a href="#">Laptop</a></li>
                    <li><a href="#">Camera</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                </ul>
            </li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li><a href="#">Hỗ trợ</a></li>
        </ul>
    </nav>

    <!--MAIN-->
    <section>
        <div class="main">
            <div class="page-status">
            </div>

            <div class="cart-review">
                <div class="product-infor">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tạm tính</th>
                                <th></th>
                            </tr>
                        </thead>
                        <form method="POST">
                            <tbody>
                                <?php foreach ($cart as $key => $item): ?>
                                    <tr>
                                        <td>
                                            <div class="pair">
                                                <img src="<?= $item['image'] ?>" alt="">
                                                <p><?= $item['name'] ?> <br><small style="color:#888;">Màu:
                                                        <?= $item['color'] ?></small></p>
                                            </div>
                                        </td>
                                        <td><?= format_price($item['price']) ?></td>

                                        <input type="hidden" name="keys[]" value="<?= $key ?>">

                                        <td><input type="number" name="quantities[]" value="<?= $item['quantity'] ?>"
                                                min="1"></td>

                                        <td><?= format_price($item['price'] * $item['quantity']) ?></td>
                                        <td>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="remove_key" value="<?= $key ?>">
                                                <button type="submit" name="remove_item" class="remove-btn"
                                                    onclick="return confirm('Xoá sản phẩm này?')">✖</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                    </table>

                    <div class="update">
                        <button type="submit" name="update_cart" class="checkout">Cập nhật giỏ hàng</button>
                    </div>
                </div>

                <div class="bill-total">
                    <h3>THANH TOÁN</h3>
                    <hr>
                    <div class="subtotal">
                        <p>Tạm tính:</p>
                        <p><?= format_price($subtotal) ?></p>
                    </div>

                    <div class="shipping">
                        <p>Phí giao hàng:</p>
                        <p class="noti">
                            Tính phí theo đơn vị vận chuyển
                            <br>
                            (Miễn phí vận chuyển với đơn hàng từ 5.000.000₫)
                        </p>
                    </div>

                    <div class="total">
                        <p>Tổng cộng</p>
                        <p><?= format_price($subtotal) ?></p>
                    </div>

                    <button onclick="window.location.href='./payment.php'"class="checkout">Tiến hành thanh toán</button>
                </div>
            </div>
        </div>
    </section>

    <scrips>

    </scrips>

    <!--FOOTER-->
    <footer>

        <div class="footer-content">
            <div class="footer-address">
                <p><b>HEARTECH</b></p>
                <div class="separator-hori"></div>
                <p><b>Địa chỉ:</b> Hà Đông, Hà Nội</p>
                <p><b>Email:</b> cskh@heartech.vn</p>
                <p><b>Hotline:</b> 0987654321</p>
            </div>

            <div class="footer-social">

                <p><b>Các trang thông tin khác:</b></p>
                <ul>
                    <li>
                        x<i class="ti-instagram"></i>
                    </li>
                    <li>
                        x<i class="ti-facebook"></i>
                    </li>
                    <li>
                        x<i class="ti-youtube"></i>
                    </li>
                </ul>

            </div>

        </div>

        <div class="copyright">
            <p>&copy; 2025 HEARTECH</p>
        </div>

    </footer>

</body>

</html>