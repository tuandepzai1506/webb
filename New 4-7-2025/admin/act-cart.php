<?php
session_start();

// Khởi tạo giỏ nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Lấy dữ liệu POST
$id = $_POST['product_id'];
$name = $_POST['product_name'];
$price = (int)$_POST['price'];
$image = $_POST['image'];
$color = $_POST['color'];
$quantity = (int)$_POST['quantity'];

// Tạo key duy nhất cho từng màu của sản phẩm
$key = $id . '-' . $color;

// Nếu đã tồn tại trong giỏ thì cộng số lượng
if (isset($_SESSION['cart'][$key])) {
    $_SESSION['cart'][$key]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$key] = [
        'product_id' => $id,
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'color' => $color,
        'quantity' => $quantity
    ];
}

// Chuyển về lại trang giỏ
header("Location: cart.php");
exit;
