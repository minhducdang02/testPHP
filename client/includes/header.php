<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/img/logo1.jpg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fb91352b7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/default.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/alert.css">
    <link rel="stylesheet" href="./src/css/modal.css">
    <title>Website FujiLuxurry </title>
</head>

<body>
    <header>
        <div class="head">
            <a href="./" class="logo"><img src="./src/img/logo1.jpg" alt=""></a>
            <!-- <i class="fa-solid fa-bars"></i> -->
            <ul>
                <li><a href="./" class="nav">Trang chủ</a></li>
                <li><a href="./#top-product" class="nav">Sản phẩm</a></li>
                <li><a href="#about-us" class="nav">Liên hệ</a></li>
                <li>
                    <a href="./?action=cart" class="nav">Giỏ hàng</a>
                    <span class="count"><?php echo $count ?></span>
                </li>
                <!-- tai khoan -->
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li>
                        <a href="./?action=user" class="nav">
                                <i class="fa-solid fa-user"></i> Xin chào: <?php echo (new User())->getName($_SESSION['user']['name']) ?>
                        </a>
                    </li>
                    <li><a href="./?action=logout" class="nav">Đăng xuất</a></li>
                <?php } else { ?>
                    <li>
                        <div class="nav btn-login">Đăng nhập</div>
                    </li>
                    <li>
                        <div class="nav btn-register">Đăng kí</div>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
    </header>
    <div class="fix"></div>