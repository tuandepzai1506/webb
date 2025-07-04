<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

//Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "heartech");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

//Lấy ID từ URL
if (!isset($_GET["id"])) {
    echo "Không tìm thấy sản phẩm.";
    exit;
}
$product_id = (int) $_GET["id"];

//Truy vấn sản phẩm
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

//Truy vấn màu
$colors = [];
$color_sql = "SELECT * FROM product_colors WHERE product_id = ?";
$color_stmt = $conn->prepare($color_sql);
$color_stmt->bind_param("i", $product_id);
$color_stmt->execute();
$color_result = $color_stmt->get_result();
while ($row = $color_result->fetch_assoc()) {
    $colors[] = $row;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>HEARTECH - Trang chủ</title>
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

        .product-main {
            background: white;
            padding: 30px;
            display: flex;
            gap: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 30px 30px 0px 30px;
        }

        .product-images {
            flex: 2;
            display: flex;
            flex-direction: column;
            /* xếp theo hàng dọc */
            align-items: center;
            /* căn giữa theo chiều ngang */
            justify-content: center;
            /* căn giữa theo chiều dọc nếu muốn */
        }

        .product-images img {
            width: 100%;
            border-radius: 8px;
        }

        .product-small-image {
            width: 10%;
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 0;
        }

        .product-info {
            flex: 2;
            display: flex;
            flex-direction: column;
            text-align: left;
            line-height: 1.5;
        }

        .product-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-brand,
        .product-org {
            color: #6b7280;
        }

        .price-old {
            text-decoration: line-through;
            color: #aaa;
            font-size: 18px;
        }

        .product-price {
            font-size: 28px;
            font-weight: bold;
            color: #111;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .option-title {
            display: flex;
        }

        .color-options {
            display: flex;
            gap: 10px;
            margin: 10px 0 20px;
        }

        .color-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #ccc;
            cursor: pointer;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity-selector input {
            width: 40px;
            text-align: center;
            height: 31px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
        }

        .quantity-selector .btn-minus,
        .quantity-selector .btn-plus {
            width: 30px;
            height: 34.75px;
        }

        .quantity-selector .btn-minus {
            border-right: 0;
        }

        .quantity-selector .btn-plus {
            border-left: 0;
        }

        .voucher {
            border: 2px solid #ccc;
            border-radius: 8px;
            /*padding: 10px;*/
        }

        .voucher-title {
            margin: 10px 15px 10px 15px;
        }

        .voucher-content {
            margin: 0px 15px 0px 0px;
        }

        .buy-section {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .cart-button {
            flex: 1;
            background-color: #000;
            color: white;
            padding: 12px;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .buy-button {
            flex: 1;
            background-color: #b25089;
            color: white;
            padding: 12px;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-details {
            display: flex;
            gap: 30px;
            background: white;
            padding: 30px;
            margin: 10px auto 0px auto;
        }

        .product-description {
            flex: 2;
            background: black;
            color: white;
            border-radius: 12px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            line-height: 1.5;
        }

        .product-description h3 {
            margin-top: 0;
        }

        .tech-specs {
            flex: 1;
            background: #f9f9f9;
            border-radius: 12px;
            padding: 20px;
            color: #222;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tech-specs h4 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 8px;
            margin-bottom: 10px;
        }

        .tech-specs ul {
            padding-left: 16px;
        }

        .cart-header {
            position: relative;
        }

        .cart-header>p {
            position: absolute;
            right: 6px;
            top: 8px;
            width: 18px;
            height: 18px;
            background-color: red;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 10px;
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

            <a class="cart-header" href="./cart.php">
                <p class="cart-item"><?= $totalQuantity?></p>
                <i class="ti-shopping-cart">x</i>
            </a>

            <a href="#"><?= $_SESSION["username"] ?></a>

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

            <div class="product-main">
                <div class="product-images">
                    <div class="product-big-image">
                        <img id="main-image" src="<?= $colors[0]['image_url'] ?>" alt="Hình ảnh sản phẩm">
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-title"><?= $product['name'] ?></div>
                    <div class="product-brand">Thương hiệu: <?= $product['brand'] ?></div>
                    <div class="product-org">Nơi sản xuất: <?= $product['origin'] ?></div>

                    <div class="product-price">
                        <span class="price-old"><?= number_format($product['price_old'], 0, '', '.') ?>₫</span> &nbsp;
                        <?= number_format($product['price_new'], 0, '', '.') ?>₫
                    </div>

                    <div class="options">
                        <div class="option-title">
                            <label>Màu:&nbsp;</label>
                            <div id="img-name">Bạc</div>
                        </div>

                        <div class="color-options">
                            <?php foreach ($colors as $index => $color): ?>
                                <div class="color-dot" style="background:<?= $color['color_code'] ?>"
                                    onclick="changeImage(<?= $index ?>)">
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <div class="quantity-selector">
                        <label>Số lượng:&nbsp;</label>
                        <input type="button" value="-" class="btn-minus" onclick="changeQty(-1)">
                        <input type="text" id="qty" value="1" class="btn-number">
                        <input type="button" value="+" class="btn-plus" onclick="changeQty(1)">
                    </div>

                    <div class="voucher">
                        <div class="voucher-title">
                            <label>Quà tặng và ưu đãi</label>
                        </div>
                        <hr>
                        <div class="voucher-content">
                            <ul>
                                <li>Nhập mã ZLPFPT giảm đến 200,000đ khi thanh toán qua VNPay</li>
                                <li>Tặng phiếu mua hàng 200,000đ mua Microsoft® 365 Personal/Family khi mua kèm Máy tính
                                    xách tay/Macbook/iPad/PC</li>
                                <li>Giảm ngay 800K khi trả góp qua thẻ tín dụng TECHCOMBANK</li>
                            </ul>
                        </div>
                    </div>

                    <div class="buy-section">
                        <form id="cart-form">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price_new'] ?>">
                            <input type="hidden" name="image" value="<?= $colors[0]['image_url'] ?>">
                            <input type="hidden" name="color" id="selectedColor"
                                value="<?= $colors[0]['color_name'] ?>">
                            <input type="hidden" name="quantity" id="selectedQty" value="1">
                            <button type="submit" class="cart-button">Thêm giỏ hàng</button>
                        </form>

                        <form method="post" action="./act-cart.php">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                            <input type="hidden" name="price" value="<?= $product['price_new'] ?>">
                            <input type="hidden" name="image" value="<?= $colors[0]['image_url'] ?>">
                            <input type="hidden" name="color" id="selectedColor"
                                value="<?= $colors[0]['color_name'] ?>">
                            <input type="hidden" name="quantity" id="selectedQty" value="1">
                            <button type="submit" class="buy-button">Mua ngay</button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function changeQty(change) {
                    const input = document.getElementById("qty");
                    let qty = parseInt(input.value);
                    qty = isNaN(qty) ? 1 : qty + change;
                    if (qty < 1) qty = 1;
                    input.value = qty;
                }

                const images = <?= json_encode(array_column($colors, "image_url")) ?>;
                const names = <?= json_encode(array_column($colors, "color_name")) ?>;

                const qtyInput = document.getElementById("qty");
                const qtyHidden = document.getElementById("selectedQty");
                qtyInput.addEventListener("change", () => {
                    qtyHidden.value = qtyInput.value;
                });

                function changeImage(index) {
                    document.getElementById("main-image").src = images[index];
                    document.getElementById("img-name").innerText = names[index];
                    document.getElementById("selectedColor").value = names[index];
                }

                const form = document.getElementById("cart-form");
                const cartCount = document.querySelector(".cart-item");

                form.addEventListener("submit", function (e) {
                    e.preventDefault();
                    qtyHidden.value = qtyInput.value;

                    const formData = new FormData(form);
                    fetch("act-count.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            cartCount.textContent = data; // Cập nhật số lượng giỏ hàng
                            alert("Đã thêm vào giỏ hàng!");
                        })
                        .catch(error => {
                            console.error("Lỗi:", error);
                        });
                });
            </script>

            <div class="product-details">
                <div class="product-description">
                    <h3>Thông tin sản phẩm</h3>
                </div>

                <div class="tech-specs">
                    <h4>Thông số kỹ thuật</h4>
                </div>
            </div>

        </div>

    </section>

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