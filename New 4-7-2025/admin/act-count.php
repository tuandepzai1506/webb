<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$id = $_POST['product_id'];
$name = $_POST['product_name'];
$price = (int)$_POST['price'];
$image = $_POST['image'];
$color = $_POST['color'];
$quantity = (int)$_POST['quantity'];

$key = $id . '-' . $color;

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

// Đếm tổng số lượng sản phẩm trong giỏ
$totalQuantity = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalQuantity += $item['quantity'];
}

echo $totalQuantity;
