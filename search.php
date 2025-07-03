<?php
include 'connect.php';
$name = isset($_GET['filter']) ? '%' . $_GET['filter'] . '%' : null;
$stmt = $conn->prepare("SELECT * FROM product_detail WHERE product_name LIKE ?");
$stmt->bind_param("s", $name);


$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='row ms-5'>";
    while ($row = $result->fetch_assoc()) {
        $cost = (int) $row['product_cost'];
        $formatted_cost = number_format($cost, 0, '', '.');
        echo "
              <div class='col d-flex justify-content-center'>
                <a class='text-decoration-none' href='?page=product&type={$row['product_type']}&name={$row['product_name']}'>
                  <div class = 'card' style='width: 70% ; min-width:450px'>
                    <div class='image-card' style='min-height:460px'>
                        <img src='image/{$row['product_img']}' class='card-img-top' alt=''/>
                    </div>
                    <div class='card-body'>
                        <p class='card-text fw-bold'style='min-height:50px'>{$row['product_name']}</p>
                        <p class='card-text fw-light'>{$row['product_description']}</p>
                        <p class='card-text fw-bold text-danger'>{$formatted_cost} VNĐ</p>
                    </div>
                  </div>
                </a>   
              </div>
                 ";
    }
    echo "</div>";
} else {
    echo "Không có dữ liệu";
}

$conn->close(); // Đóng kết nối
?>