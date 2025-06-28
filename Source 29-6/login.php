<?php
session_start();
if (isset($_POST["login"])) {
    $conn = new mysqli("localhost", "root", "", "heartech");

    $errors = [];

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user["username"];
            // redirect
            header("Location: admin/home.php");
            exit;
        } else {
            $errors[] = "Sai mật khẩu!";
        }
    } else {
        $errors[] = "Tài khoản không tồn tại!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>HEARTECH - Đăng nhập</title>
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
            display: -webkit-flex;
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

        section {
            justify-content: center;
            padding: 80px;
        }

        .container h2 {
            text-align: center;
            color: #944473;
        }

        .container {
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            padding: 20px;
        }

        .container form {
            background: #ffffff;
            max-width: 400px;
            margin: auto;
        }

        .container input {
            width: 94%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #e1e3e5;
        }

        .container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            color: #944473;
            border: 1px solid #e1e3e5;
            border-radius: 10px;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            font-size: larger;
        }

        .sign-up {
            text-align: center;
        }

        .container a {
            color: gray;
        }

        .container a:visited {
            color: gray;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

    <!--HEADER-->
    <header>

        <div class="left-header">
            <a href="./home.php">
                <img class="logo" src="./image/logo.png" alt="" width="200" height="50">
            </a>
        </div>

        <div class="right-header">
            <form class="search-form" action="#" method="get">
                <input type="text" name="q" placeholder="Tìm kiếm...">
                <button type="submit">🔍</button>
            </form>

            <div class="separator"></div>

            <a href="./login.php" class="login-btn">Đăng nhập</a>
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
        <div class="container">

            <h2>ĐĂNG NHẬP</h2>
            <form method="POST">
                <input type="text" name="username" placeholder="Tên người dùng" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <button type="submit" name="login">Đăng nhập</button>
            </form>

            <div class="sign-up">
                <a href="./sign-up.php">Bạn chưa có tài khoản?</a>
            </div>

            <?php
            if (!empty($errors)) {
                    echo "<br><div class='error'>";
                    foreach ($errors as $e) {
                        echo "$e";
                    }
                    echo "</div>";
                }
            ?>

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