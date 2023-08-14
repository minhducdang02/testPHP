<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fb91352b7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../admin/src/css/mainadmin.css">
    <link rel="stylesheet" href="../client/src/css/default.css">
    <link rel="stylesheet" href="../client/src/css/modal.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <title>ADMIN</title>
</head>

<body>
    <div class="container-fluid conteneradmin">
        <!-- <div class="admin_top"><h1>Quản trị viên</h1></div>  -->
        <div class="row">
            <div class="col-sm-2 menu">
                <ul class="nav nav-pills flex-column setmenu">
                    <li class="nav-item setmenu_li">
                        <div class="nav-link setmenu_a"><h3>Quản trị viên</h3></div>
                    </li>
                    <li class="nav-item setmenu_li">
                        <a class="nav-link setmenu_a <?php if ($section == "home" || $section == "") echo "active a" ?>" href="?section=home">Trang chủ</a>
                    </li>
                    <li class="nav-item setmenu_li">
                        <a class="nav-link setmenu_a <?php if ($section == "product_manager") echo "active a" ?>" href="?section=product_manager">Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item setmenu_li">
                        <a class="nav-link setmenu_a <?php if ($section == "order_manager") echo "active a" ?>" href="?section=order_manager">Quản lý yêu cầu</a>
                    </li>
                    <li class="nav-item setmenu_li">
                        <a class="nav-link setmenu_a <?php if ($section == "user_manager") echo "active a" ?>" href="?section=user_manager">Quản lý khách hàng</a>
                    </li>
                    <li class="nav-item setmenu_li">
                        <a class="nav-link setmenu_a" href="?section=logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10 contents">