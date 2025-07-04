<?php
include 'connect.php';
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

</head>


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

                                    <td><input type="number" name="quantities[]" value="<?= $item['quantity'] ?>" min="1">
                                    </td>

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

                <button onclick="window.location.href='./payment.php'" class="checkout">Tiến hành thanh toán</button>
            </div>
        </div>
    </div>
</section>

<scrips>

</scrips>