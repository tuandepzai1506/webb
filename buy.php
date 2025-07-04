<?php
include 'connect.php';
if (isset($_POST['insert'])) {
    $name = $_POST['Name'];
    $number = $_POST['Number'];
    $address = $_POST['Address'];
    $stmt = $conn->prepare("INSERT INTO product_order (order_name, order_number, order_address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sss", $name, $number, $address);  // s: string, i: integer
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Mua hàng thành công'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra vui lòng thử lại');</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Lỗi.');</script>";
}


$conn->close();
?>

<div>
    <div>
        <div class="container">
            <div class="d-flex">
                <div class="w-50 ps-0 ms-0">
                    <h2 class="px-5 ms-3 mb-3 w-100">Phiếu mua hàng</h2>
                    <form class="px-5 ms-3 mb-3 w-100" method="POST">
                        <div>
                            <label for="exampleInputName1">Họ và tên</label>
                            <input name="Name" type="text" class="form-control" placeholder="Họ và tên">
                        </div>
                        <div>
                            <label for="exampleInputNumber1">Số điện thoại</label>
                            <input name="Number" type="text" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div>
                            <label for="exampleInputAddress1">Địa chỉ</label>
                            <input name="Address" type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                        <button type="submit" name="insert" class="btn btn-danger">Mua ngay</button>
                    </form>

                </div>
                <a><img src="image/logo-h.png" class="ms-2" style="width:500px" /></a>
            </div>
        </div>
    </div>
</div>


<!-- <div class='modal fade' id=buyId>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>THÔNG BÁO</h5>
                                </div>
                                <div class='modal-body'>
                                    Mua hàng thành công
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>

                    </div> -->