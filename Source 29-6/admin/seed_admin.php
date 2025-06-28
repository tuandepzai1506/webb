<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "heartech");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Tài khoản mẫu admin
$username = "admin";
$email = "admin@heartech.vn";
$phone = "0999999999";
$address = "Quản trị hệ thống";
$password = "admin123"; // Mật khẩu gốc
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Kiểm tra đã tồn tại chưa
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    // Thêm admin nếu chưa tồn tại
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO users (username, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $phone, $address, $hashed);
    if ($stmt->execute()) {
        echo "✅ Đã tạo tài khoản admin: <strong>$username</strong> (mật khẩu: $password)";
    } else {
        echo "❌ Lỗi khi tạo admin.";
    }
} else {
    echo "⚠️ Admin đã tồn tại.";
}

$stmt->close();
$conn->close();
?>
