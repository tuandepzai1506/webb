<section>

    <!--LEFT-->
    <aside id="aside-left">
        <img src="image/quang-cao-nim.png" alt="" width="250" height="350" usemap="#map1">

        <map name="map1">
            <area shape="rect" coords="0,0,250,350" href="https://en.gamesaien.com/game/fruit_box/" alt="">
        </map>
    </aside>

    <!--CONTENT-->
    <article>
        <div class="container-1">
            <h2>Sản phẩm mới</h2>
            <div class="products">
                <?php
                include 'connect.php';
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                $sql = "SELECT * FROM product_detail limit 2";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $cost = (int) $row['product_cost'];
                        $formatted_cost = number_format($cost, 0, '', '.');
                        echo "
                            <div class='product' id='01' >
                                <img src='image/{$row['product_img']}' class='card-img-top ' alt=''/>
                                <h3 style='min-height:150px'>{$row['product_name']}</h3>
                                <div class='price'>{$formatted_cost} VNĐ</div>
                                <a class='buy-btn text-decoration-none' href='?page=product&type={$row['product_type']}&name={$row['product_name']}'>Mua ngay</a>
                            </div>
                        ";
                    }
                }
                ?>
            </div>
        </div>

        <div class="container-2">
            <h2>Sản phẩm nổi bật</h2>
            <div class="products">
                <?php
                include 'connect.php';
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                $sql = "SELECT * FROM product_detail limit 2 offset 2";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $cost = (int) $row['product_cost'];
                        $formatted_cost = number_format($cost, 0, '', '.');
                        echo "
                            <div class='product' id='01' >
                                <img src='image/{$row['product_img']}' class='card-img-top ' alt=''/>
                                <h3 style='min-height:150px'>{$row['product_name']}</h3>
                                <div class='price'>{$formatted_cost} VNĐ</div>
                                <a class='buy-btn text-decoration-none' href='?page=product&type={$row['product_type']}&name={$row['product_name']}'>Mua ngay</a>
                            </div>
                        ";
                    }
                }
                ?>
    </article>
    <!--RIGHT-->
    <aside id="aside-right">
        <div class="slideshow-container">
            <p>🔥HOT🔥</p>

            <div class="slide">
                <img class="slide-img"
                    src="https://bizweb.dktcdn.net/thumb/grande/100/534/572/products/mchose-a7-white-website-1.png?v=1733222434193"
                    width="250" height="auto" />
            </div>

            <div class="slide">
                <img class="slide-img"
                    src="https://product.hstatic.net/200000722513/product/1_e85e939e505342d8ace6c99cf9c7ec95_d13fcc785323458da54fd28dace814dc_grande.jpg"
                    width="250" height="auto" />
            </div>

            <div class="slide">
                <img class="slide-img"
                    src="https://bizweb.dktcdn.net/thumb/grande/100/082/878/products/86921-man-hinh-lenovo-l27i-4a-3.jpg?v=1730435393250"
                    width="250" height="auto" />
            </div>
            <div class="dot-container">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </aside>
</section>