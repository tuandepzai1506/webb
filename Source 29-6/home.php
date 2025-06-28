<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>HEARTECH - Trang chủ</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        header {
            background-color: #f8f4f1;
            color: #944473;
            padding: 20px 200px;
            padding-bottom: 0;
            /*text-align: center;*/
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .left-header {
            display: flex;
            align-items: center;
        }

        .right-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .separator {
            /*Cái bên cạnh nút đăng kí*/
            width: 1px;
            height: 24px;
            background-color: #ccc;
        }

        .login-btn {
            color: #944473;
            padding: 6px 12px;
            border: 1px solid #944473;
            border-radius: 20px;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color: white;
            color: #944473;
        }

        .search-form {
            border: 1px solid #944473;
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .search-form input[type="text"] {
            border: none;
            padding: 8px;
            outline: none;
            width: 180px;
        }

        .search-form button {
            background-color: white;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        nav {
            background-color: #f8f4f1;
            /*margin: 5px 10%;*/
            font-weight: bold;
        }

        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav>ul li {
            list-style: none;
        }

        nav>ul li a {
            padding: 0 25px;
            display: block;
            line-height: 50px;
            color: #944473;
            /*text-decoration: none;*/
        }

        nav a:visited {
            color: #944473;
        }

        nav a:hover {
            opacity: .7;
            background: #ffffff;
            color: #1a1a1a;
        }

        nav li ul {
            display: none;
            min-width: 350px;
            position: absolute;
        }

        nav li>ul li {
            width: 100%;
            border: none;
            border-bottom: 1px solid #ccc;
            background: #f8f4f1;
            text-align: left;
        }

        nav li:hover>ul {
            display: block;
        }

        section {
            display: -webkit-flex;
        }

        #aside-left {
            -webkit-flex: 1;
            justify-content: center;
            display: flex;
            padding: 30px 0px;
        }

        article {
            -webkit-flex: 3;
        }

        #aside-right {
            -webkit-flex: 1;
            justify-content: center;
            /*display: flex;*/
            padding: 30px 0px;
        }

        footer {
            font-size: small;
            color: #944473;
            background-color: #f8f4f1;
        }

        .footer-content {
            padding: 20px 200px;
            display: flex;
            justify-content: space-between;
        }

        .footer-social {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .footer-social ul {
            display: flex;
            gap: 15px;
        }

        .footer-social ul li {
            list-style-type: none;
            padding: 8px 0;
        }

        .separator-hori {
            /*Cái bên cạnh nút đăng kí*/
            width: 50px;
            height: 1px;
            background-color: #ccc;
        }

        .copyright {
            text-align: center;
            background-color: #1a1a1a;
            color: white;
            padding: 1px;
        }

        a {
            text-decoration: none;
        }

        .container-1,
        .container-2,
        .container-3 {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #0000001a;
            text-align: center;
            transition: 0.3s;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product h3 {
            margin: 10px 0 5px;
        }

        .price {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .buy-btn {
            font-family: 'Courier New', Courier, monospace;
            background-color: #b25089;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .buy-btn:hover {
            background-color: #944473;
        }

        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            color: #d93737;
            font-weight: bold;
            text-align: center;
        }

        .slide {
            display: none;
        }

        .dot-container {
            margin-top: 10px;
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }
    </style>
</head>

<body>

    <!--HEADER-->
    <header>

        <div class="left-header">
            <a href="./home.php">
                <img class="logo" src="./image/logo.png" alt="" width="200" height="50">
            </a>
        </div>

        <div class="right-header">
            <form class="search-form" action="#" method="get">
                <input type="text" name="q" placeholder="Tìm kiếm...">
                <button type="submit">🔍</button>
            </form>

            <div class="separator"></div>

            <a href="./login.php" class="login-btn">Đăng nhập</a>
        </div>

    </header>

    <!--MENU-->
    <nav>
        <ul>
            <li><a href="./home.php">Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a>
                <ul>
                    <li><a href="#">Laptop</a></li>
                    <li><a href="#">Camera</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                </ul>
            </li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li><a href="#">Hỗ trợ</a></li>
        </ul>
    </nav>

    <!--MAIN-->
    <section>

        <!--LEFT-->
        <aside id="aside-left">
            <img src="./image/quang-cao/quang-cao-nim.png" alt="" width="250" height="350" usemap="#map1">

            <map name="map1">
                <area shape="rect" coords="0,0,250,350" href="https://en.gamesaien.com/game/fruit_box/" alt="">
            </map>
        </aside>

        <!--CONTENT-->
        <article>
            <div class="container-1">
                <h2>Sản phẩm mới</h2>
                <div class="products">
                    <!-- Sản phẩm 1 -->
                    <div class="product" id="01">
                        <img src="" alt="Sản phẩm">
                        <h3>MacBook Air M4</h3>
                        <div class="price">26.290.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 2 -->
                    <div class="product" id="02">
                        <img src="" alt="Sản phẩm">
                        <h3>Dell Latitude 3450</h3>
                        <div class="price">19.990.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 3 -->
                    <div class="product" id="03">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 4 -->
                    <div class="product" id="04">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 5 -->
                    <div class="product" id="05">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 6 -->
                    <div class="product" id="06">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>
                </div>
            </div>

            <div class="container-2">
                <h2>Sản phẩm nổi bật</h2>
                <div class="products">
                    <!-- Sản phẩm 1 -->
                    <div class="product" id="07">
                        <img src="" alt="Sản phẩm">
                        <h3>MacBook Pro M4</h3>
                        <div class="price">39.690.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 2 -->
                    <div class="product" id="08">
                        <img src="" alt="Sản phẩm">
                        <h3>Dell Inspiron 15</h3>
                        <div class="price">16.490.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 3 -->
                    <div class="product" id="09">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 4 -->
                    <div class="product" id="10">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 5 -->
                    <div class="product" id="11">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 6 -->
                    <div class="product" id="12">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>
                </div>
            </div>

            <div class="container-3">
                <h2>Gợi ý cho bạn</h2>
                <div class="products">
                    <!-- Sản phẩm 1 -->
                    <div class="product" id="13">
                        <img src="" alt="Sản phẩm">
                        <h3>Áo thun</h3>
                        <div class="price">150.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 2 -->
                    <div class="product" id="14">
                        <img src="" alt="Sản phẩm">
                        <h3>Quần jean</h3>
                        <div class="price">350.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 3 -->
                    <div class="product" id="15">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 4 -->
                    <div class="product" id="16">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 5 -->
                    <div class="product" id="17">
                        <img src="" alt="Sản phẩm">
                        <h3>Giày</h3>
                        <div class="price">900.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>

                    <!-- Sản phẩm 6 -->
                    <div class="product" id="18">
                        <img src="" alt="Sản phẩm">
                        <h3>Phụ kiện</h3>
                        <div class="price">120.000đ</div>
                        <button class="buy-btn">Mua ngay</button>
                    </div>
                </div>
            </div>

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

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            const slides = document.getElementsByClassName("slide");
            const dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

            setTimeout(showSlides, 3000); // Chuyển ảnh sau 3 giây
        }
    </script>

    <!--FOOTER-->
    <footer>

        <div class="footer-content">
            <div class="footer-address">
                <p><b>HEARTECH</b></p>
                <div class="separator-hori"></div>
                <p><b>Địa chỉ:</b> Hà Đông, Hà Nội</p>
                <p><b>Email:</b> cskh@heartech.vn</p>
                <p><b>Hotline:</b> 0987654321</p>
            </div>

            <div class="footer-social">

                <p><b>Các trang thông tin khác:</b></p>
                <ul>
                    <li>
                        x<i class="ti-instagram"></i>
                    </li>
                    <li>
                        x<i class="ti-facebook"></i>
                    </li>
                    <li>
                        x<i class="ti-youtube"></i>
                    </li>
                </ul>

            </div>

        </div>

        <div class="copyright">
            <p>&copy; 2025 HEARTECH</p>
        </div>

    </footer>

</body>

</html>