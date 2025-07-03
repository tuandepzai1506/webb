<?php
include 'connect.php';

// Tài khoản
$errors = [];
$success = false;

if (isset($_POST["submit"])) {
    $errors = [];

    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Kiểm tra đã tồn tại chưa
    $stmt = $conn->prepare("SELECT 1 FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "Tên người dùng đã tồn tại.";
    }
    $stmt->close();

    // Kiểm tra dữ liệu
    if (empty($username))
        $errors[] = "Tên người dùng không được để trống.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Email không hợp lệ.";
    if (empty($phone)) {
        $errors[] = "Số điện thoại không được để trống.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Số điện thoại phải gồm đúng 10 chữ số.";
    }
    if (strlen($password) < 6)
        $errors[] = "Mật khẩu phải từ 6 ký tự trở lên.";

    // Chèn vào CSDL nếu hợp lệ
    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $phone, $address, $hashed);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $errors[] = "Lỗi khi chèn dữ liệu.";
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <title>HEARTECH - Đăng ký</title>
</head>

<body>
    <!--MAIN-->
    <section>
        <div class="container">

            <h2 class="text-center">ĐĂNG KÝ</h2>
            <form method="POST">
                <input type="text" name="username" placeholder="Tên người dùng">
                <input type="email" name="email" placeholder="Email">
                <input type="tel" name="phone" placeholder="Số điện thoại">
                <input type="text" name="address" placeholder="Địa chỉ">
                <input type="password" name="password" placeholder="Mật khẩu">
                <button name="submit">Đăng ký</button>

                <?php
                //Hiển thị thông báo
                if ($success) {
                    echo "<p class='success'>Đăng ký thành công!";
                } elseif (!empty($errors)) {
                    echo "<div class='error'><ul>";
                    foreach ($errors as $e) {
                        echo "<li>$e</li>";
                    }
                    echo "</ul></div>";
                }
                ?>
            </form>

        </div>
    </section>
</body>
<?php include_once("footer.php"); ?>

</html>

<?php $conn->close(); ?>