<?php

if (isset($_POST["login"])) {
    include 'connect.php';

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
            $_SESSION["role"] = $user["role"];
            if ($user["role"] == 'admin') {
                header("Location: ?page=admin");
            } else {
                header("Location: ?page=home");
            }
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

        section {
            display: -webkit-flex;
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

        section {
            justify-content: center;
            padding: 80px;
        }

        .container h2 {
            text-align: center;
            color: black;
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
            color: black;
            border: 1px solid #e1e3e5;
            border-radius: 10px;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            font-size: larger;
        }

        .sign-up {
            text-align: center;
        }


        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
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
                <a href="?page=sign-up">Bạn chưa có tài khoản?</a>
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
</body>

</html>