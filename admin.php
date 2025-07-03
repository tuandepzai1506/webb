<div class='position-absolute end-0 me-5'>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
        Thêm sản phẩm
    </button>

</div>
<section>
    <?php
    session_start();
    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
        header("Location: ?page=home");
        exit();
    }
    include 'connect.php';
    $sql = "SELECT * FROM product_detail";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "
        <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Tên sản phẩm</th>
                <th scope='col'>Giá</th>
                <th scope='col'>Xoá</th>
            </tr>
        </thead> ";
        while ($row = $result->fetch_assoc()) {
            echo "     
        <tbody>
            <tr>
                <th scope='row'>{$row['product_id']}</th>
                <td>{$row['product_name']}</td>
                <td>{$row['product_cost']}</td>
                <td class='btn-danger'><a href='?page=delete&id={$row['product_id']}' onclick='return confirm(\"Bạn có chắc muốn xóa không?\")'><i class = 'ti-trash'></i></a></td>
            </tr>
            
        </tbody>    
                 ";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }
    $conn->close();
    ?>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="cost" class="form-label">Giá sản phẩm</label>
                            <input type="number" class="form-control" name="cost" required>
                        </div>
                        <div class="mb-3">
                            <label>Chọn hình ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Loại sản phẩm</label>
                            <input type="text" class="form-control" name="type" required>
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">Dòng sản phẩm</label>
                            <input type="text" class="form-control" name="detail" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="insert" class="btn btn-success">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'connect.php';
    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $detail = $_POST['detail'];

        // Xử lý hình ảnh
        $target_dir = "image/"; // thư mục chứa ảnh
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name;

        // Di chuyển file vào thư mục upload
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Lưu vào DB
            $img_name_in_db = basename($target_file);
            $stmt = $conn->prepare("INSERT INTO product_detail (product_name, product_description, product_cost, product_img, product_type, type_detail ) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisss", $name, $description, $cost, $img_name_in_db, $type, $detail);  // s: string, i: integer
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Thêm thành công!'); window.location.href='';</script>";
            } else {
                echo "<script>alert('Thêm thất bại!');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Lỗi khi tải hình ảnh.');</script>";
        }


    }
    $conn->close();
    ?>

</section>