<div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb ms-5">
    <li class="breadcrumb-item"><i class="ti-home"></i><a class="text-decoration-none" href="?page=home"> Home</a></li>
    <?php
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    echo "<li class='breadcrumb-item active text-uppercase' aria-current='page'>{$type}</li>"

      ?>
  </ol>
</div>
<?php
include 'connect.php';
$type = isset($_GET['type']) ? $_GET['type'] : null;

?>
<div class="filter d-flex text-center px-5 ms-3 mb-3">
  <form method='POST'>
    <input type="hidden" name="page" value="product">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <?php
    if ($type == "camera") { ?>
      <select name='type_detail' class="p-2">
        <option value=''>--Chọn loại camera--</option>
        <option value='Camera 360 độ'>Camera 360 độ</option>
        <option value='Camera IP'>Camera IP</option>
        <option value='camera ngoài trời'>Camera an ninh ngoài trời</option>
      </select>

    <?php } else if ($type == "monitor") { ?>
        <select name='type_detail' class="p-2">
          <option value=''>--Chọn loại màn hình--</option>
          <option value="Màn hình IPS">>Màn hình IPS</option>
          <option value='Màn hình LCD'>Màn hình LCD</option>
        </select>

    <?php } else if ($type == "keyboard") { ?>
          <select name='type_detail' class="p-2">
            <option value=''>--Chọn loại bàn phím--</option>
            <option value='Bàn phím cơ'>Bàn phím cơ</option>
            <option value='Bàn phím không dây'>Bàn phím không dây</option>
          </select>

    <?php } else if ($type == "mouse") { ?>
            <select name='type_detail' class="p-2">
              <option value=''>--Chọn loại chuột--</option>
              <option value='Chuột có dây'>Chuột có dây</option>
              <option value='Chuột không dây'>Chuột không dây</option>
            </select>

    <?php } ?>
    <button class="p-2 btn btn-primary">Lọc</button>
  </form>
</div>

<?php
include 'connect.php';
$type = isset($_GET['type']) ? $_GET['type'] : null;

$detail = $_POST['type_detail'] ?? null;

if (!empty($detail)) {
  $stmt = $conn->prepare("SELECT * FROM product_detail WHERE type_detail = ?");
  $stmt->bind_param("s", $detail);
} elseif (!empty($type)) {
  $stmt = $conn->prepare("SELECT * FROM product_detail WHERE product_type = ?");
  $stmt->bind_param("s", $type);
} else {
  echo "Không có dữ liệu lọc";
  exit;
}

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