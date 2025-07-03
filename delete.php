<?php
include 'connect.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id > 0) {
    $sql = "DELETE FROM product_detail WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header("Location: ?page=admin");
    } else {
        echo "ID không hợp lệ.";
    }
    $stmt->close();

} else {
    echo "ID không hợp lệ. $id";
}
$conn->close();
?>