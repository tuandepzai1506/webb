<div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb ms-5">
        <li class="breadcrumb-item"><i class="ti-home"></i><a class="text-decoration-none" href="?page=home"> Home</a>
        </li>
        <?php
        $type = isset($_GET['type']) ? $_GET['type'] : null;
        echo "<li class='breadcrumb-item active text-uppercase' aria-current='page'><a class ='text-decoration-none' href='?page=sanpham&type={$type}'>{$type}</a></li>";
        $name = isset($_GET['name']) ? $_GET['name'] : null;
        echo "<li class='breadcrumb-item active text-uppercase' aria-current='page'><a class ='text-decoration-none'>{$name}</a></li>";
        ?>
    </ol>
</div>
<?php
include 'connect.php';
$name = isset($_GET['name']) ? $_GET['name'] : null;

$sql = "SELECT * FROM product_detail WHERE product_name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cost = (int) $row['product_cost'];
        $formatted_cost = number_format($cost, 0, '', '.');
        echo "
           <div class='col d-flex justify-content-center '>
                
                  <div class = 'card' style='width: 70%  min-width:450px'>
                    <div class='image-card' style='min-height:460px'>
                        <img src='image/{$row['product_img']}' class='card-img-top ' alt=''/>
                    </div>
                    <div class='card-body'>
                        <p class='card-text fw-bold'style='min-height:50px'>{$row['product_name']}</p>
                        <p class='card-text fw-light'>{$row['product_description']}</p>
                        <p class='card-text fw-bold text-danger'>{$formatted_cost} VNĐ</p>
                            <a type='submit' class='btn btn-danger'  href='?page=buy&id={$row['product_id']}'>
                                Mua ngay
                            </a>
                            
                    </div>
                  </div>
                   
              </div>
                 ";
    }
}
?>