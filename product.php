<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Camera IP 360 độ TP-Link Tapo | Heartech</title>
    <link rel="stylesheet" type="text/css" href="./home.css">
    <!--<link rel="stylesheet" type="text/css" href="./product.css">-->
    <style>
      body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

main {
    max-width: 1200px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    display: flex;
    gap: 30px;
}

.product-images {
    flex: 1;
}

.product-images img {
    width: 100%;
    border-radius: 8px;
}

.product-info {
    flex: 2;
    display: flex;
    flex-direction: column;
    text-align: left;
}

.product-title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 5px;
}

.product-sku {
    font-size: 14px;
    color: #888;
    margin-bottom: 15px;
}

.store-info {
    background: #eaf1ff;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.store-info strong {
    display: block;
    margin-bottom: 5px;
}

.price-old {
    text-decoration: line-through;
    color: #aaa;
    font-size: 18px;
}

.product-price {
    font-size: 28px;
    font-weight: bold;
    color: #111;
    margin-bottom: 20px;
}

.options label {
    font-weight: bold;
}

.color-options,
.version-options {
    display: flex;
    gap: 10px;
    margin: 10px 0 20px;
}

.color-dot {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #ccc;
    cursor: pointer;
}

.version-options button {
    padding: 6px 12px;
    border: 1px solid #ccc;
    background: white;
    cursor: pointer;
}

.quantity-selector {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.quantity-selector input {
    width: 40px;
    text-align: center;
}

.quantity-selector button {
    width: 30px;
    height: 30px;
    font-weight: bold;
    border: 1px solid #ccc;
    background: white;
    cursor: pointer;
}

.buy-section {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.cart-button {
    flex: 1;
    background-color: #000;
    color: white;
    padding: 12px;
    border: none;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.buy-button {
    flex: 1;
    background-color: #5dbb63;
    color: white;
    padding: 12px;
    border: none;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.extras {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #444;
}

.product-details {
    display: flex;
    gap: 30px;
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-description {
    flex: 2;
    background: black;
    color: white;
    border-radius: 12px;
    padding: 20px;
}

.product-description h3 {
    margin-top: 0;
}

.tech-specs {
    flex: 1;
    background: #f9f9f9;
    border-radius: 12px;
    padding: 20px;
    color: #222;
}

.tech-specs h4 {
    border-bottom: 1px solid #ccc;
    padding-bottom: 8px;
    margin-bottom: 10px;
}

.tech-specs ul {
    padding-left: 16px;
}

.separator-footer {
    padding: 0px;
    margin: 10px;
    width: 90px;
    height: 1px;
    background-color: #ccc;
}

    </style>
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="./footer.css">
</head>

<body>
    <!--MAIN-->
    <container id="container">

        <!--CONTENT-->
        <div class="main">
          
            <main>
                <div class="product-images">
                    <img id="main-image" src="./image/camera-ip-wifi-360-tp-link-tapo-c202-hong-ngoai-1080-full-hd_2_.png" alt="Hình ảnh sản phẩm">
                </div>

                <div class="product-info">
                    <div class="product-title">Camera IP 360 độ TP-Link Tapo</div>
                    <div class="product-brand">Thương hiệu: TP-Link</div>

                    <div class="product-price">
                        <span class="price-old">890.000 ₫</span> &nbsp; 650.000 ₫
                    </div>

                    <div class="options">
                        <label>Màu:</label>
                        <div class="color-options">
                        <div class="color-dot" style="background:#fff;" onclick="changeImage(0)"></div>
                        <div class="color-dot" style="background:#666;" onclick="changeImage(1)"></div>
                        <div class="color-dot" style="background:#000;" onclick="changeImage(2)"></div>
                    </div>
                </div>

                <div class="quantity-selector">
                    <label>Số lượng:&nbsp;</label>
                    <button onclick="changeQty(-1)">-</button>
                    <input type="text" id="qty" value="1">
                    <button onclick="changeQty(1)">+</button>
                </div>

                <div class="buy-section">
                    <button class="cart-button">Thêm giỏ hàng</button>
                    <button class="buy-button">Mua ngay</button>
                </div>
            </main>
        </div>


<script>
function changeQty(change) {
  const input = document.getElementById("qty");
  let qty = parseInt(input.value);
  qty = isNaN(qty) ? 1 : qty + change;
  if (qty < 1) qty = 1;
  input.value = qty;
}

function changeImage(index) {
  const images = [
    "./image/camera-ip-wifi-360-tp-link-tapo-c202-hong-ngoai-1080-full-hd_2_.png",
    "./image/camera-ip-wifi-360-tp-link-tapo-c202-hong-ngoai-1080-full-hd_3_.png",
    "./image/camera-ip-wifi-360-do-tp-link-tapo-4mp-c220-2.png"
  ];
  document.getElementById("main-image").src = images[index];
}
</script>

<section class="product-details">
  <div class="product-description">
    <h3>Thông tin sản phẩm</h3>
    <br>
    <h2>TPLINK TAPO CÓ THỂ QUAY GÓC RỘNG NHẤT BAO NHIÊU?</h2>
    <br>
    <p>Camera Tapo được thiết kế để có góc quay khá linh hoạt, 
        giúp bạn quan sát được một không gian rộng lớn. 
        <b>Cụ thể:</b><br>
        <b>Xoay ngang:</b> Camera có thể xoay ngang 360 độ, 
        nghĩa là bạn có thể xoay camera để quan sát toàn bộ 
        một căn phòng.<br>
        <b>Quét dọc:</b> Camera có thể quét dọc lên đến 114 độ, 
        giúp bạn quan sát từ trần nhà xuống sàn nhà.<br>
        Với khả năng xoay đa hướng này, bạn có thể dễ dàng điều chỉnh hướng của camera 
        để quan sát mọi ngóc ngách trong ngôi nhà của mình.
    </p>
    <img src="./image/camera-ip-wifi-360-tp-link-tapo-c202-hong-ngoai-1080-full-hd_2_.png" width="100%" style="margin-top:10px;border-radius:10px;">
  </div>

  <div class="tech-specs">
    <h4>Thông số kỹ thuật</h4>
    <ul>
      <li><strong>Dòng camera:</strong> Camera trong nhà</li>
      <li><strong>Độ phân giải:</strong> 2MP (1920 x 1080 px)</li>
      <li><strong>Góc xoay:</strong> Ngang 360 độ, Dọc 114 độ</li>
      <li><strong>Tầm nhìn:</strong> 9m ban đêm</li>
      <li><strong>Kết nối:</strong> Wi-Fi</li>
    </ul>
    <br>
    <h4>Tính năng</h4>
    <ul>
      <li>Đàm thoại 2 chiều</li>
      <li>Báo Động Âm Thanh và Ánh Sáng</li>
      <li>Phát hiện chuyển động và thông báo</li>
      <li>Theo dõi chuyển động</li>
      <li>Phát hiện người</li>
      <li>Phát hiện tiếng khóc của trẻ sơ sinh</li>
      <li>Điều khiển bằng giọng nói</li>
      <li>Cải thiện hình ảnh DNR 3D</li>
    </ul>
  </div>
</section>

        </div>


    </container>


</body>

</html>