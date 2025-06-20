<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>TECHSTORE - Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="./main.css">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
        include_once("header.php");
            ?>
    <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        $arrayPages=['camera','monitor','mouse','keyboard','home'];

        if(in_array($page,$arrayPages)){
            include_once("$page.php");
        } else {
            echo "<h2>Không tìm thấy trang</h2>";
        }
      ?>
    <hr/>

    <?php
        include_once("footer.php");
        ?>

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
    
</body>

</html>
