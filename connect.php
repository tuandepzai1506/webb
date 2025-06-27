<?php
$servername = "localhost";  // hoặc 127.0.0.1
$username = "root";         // mặc định là 'root' nếu dùng XAMPP
$password = "";             // để trống nếu chưa đặt mật khẩu
$database = "product"; // tên CSDL bạn đã tạo trong phpMyAdmin

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>