<!DOCTYPE html>
<html lang="en">
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
    <!--HEADER-->
    <header class="row background-header">

        <div class="col-8">
            <img src="image/logo-h.png" class = "ms-2" style="width:180px"/>
        </div>
        <div class="col-4 d-flex align-items-center row">
            <div class="col">
                <form class="input-group mb-3" action="#" method="get">
                    <input class="form-control" type="text" name="q" placeholder="Tìm kiếm...">
                    <button class="input-group-text" for="">
                        <i class="ti-search"></i>
                    </button>
                </form>

            </div>

            <div class="col d-flex align-items-center">
                <a href="#" class="fw-bold text-decoration-none mb-3 font-login ">Đăng nhập</a>
            </div> 
        </div>
        

    </header>
    <nav class="bg-nav" >
        <ul class="row list-unstyled text-center">
            <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Trang chủ</a></li>
            <li class="col text-decoration-none"><a class="text-decoration-none dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="#">Sản phẩm</a>
                <ul class="list-unstyled dropdown-menu"> 
                    <li><a class="text-decoration-none dropdown-item" href="#">Laptop</a></li>
                    <li><a class="text-decoration-none dropdown-item" href="#">Camera</a></li>
                    <li><a class="text-decoration-none dropdown-item" href="#">Phụ kiện</a></li>
                </ul>
            </li>
            <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Tin tức</a></li>
            <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Liên hệ</a></li>
            <li class="col text-decoration-none"><a class="text-decoration-none" href="#">Hỗ trợ</a></li>
        </ul>
    </nav>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="nav-link">
        <li class="breadcrumb-item "><a class="text-decoration-none" href="#"><i class="ti-home "> Home</i></a></li>
    </div>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

</body>
</html>