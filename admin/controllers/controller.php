<?php
session_start();
require_once "./models/model.php";
$section = "";
//chua dang nhap thi dieu huong sang dang nhap
if (!isset($_SESSION['admin'])) {
    require_once "./views/login.php";
    die();
}
//dieu huong dua vao section
if (isset($_GET['section'])) {
    $section = $_GET['section'];
}
$tz = 'Asia/Ho_Chi_Minh';
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp(time());
$datenow = $dt->format("Y-m-d");
switch ($section) {
    case "home":
        $orderToday = (new Order($path))->getOrders("", "date like '$datenow%'");
        $order = (new Order($path))->getOrders();
        $countOrder = 0;
        $countOrderSuccess = 0;
        $countOrderLost = 0;
        $saleToday = 0;
        $count = 0;
        $sale = 0;
        foreach($orderToday as $row)
        {
            if($row['status'] == 1)
            {
                $countOrderSuccess++;
                $saleToday += $row['price'];
            }
            if($row['status'] == 2)
                $countOrderLost++;
            $countOrder++;
        }
        foreach($order as $row){
            if($row['status'] == 1)
                $sale += $row['price'];
            $count++;
        }
        require_once "./includes/header.php";
        require_once "./views/index.php";
        require_once "./includes/footer.php";
        break;
    case "user_manager":
        $users = (new User($path))->getUsers("level <> 1");
        require_once "./includes/header.php";
        require_once "./views/userManager.php";
        require_once "./includes/footer.php";
        break;
    case "product_manager":
        $products = (new Product($path))->getProducts("1=1");
        require_once "./includes/header.php";
        require_once "./views/productManager.php";
        require_once "./includes/footer.php";
        break;
    case "order_manager":
        $orders = (new Order($path))->getOrders("", "1=1", "id desc");
        require_once "./includes/header.php";
        require_once "./views/orderManager.php";
        require_once "./includes/footer.php";
        break;
    case "logout":
        unset($_SESSION['admin']);
        header("location: ./");
        break;
    default:
        header("location: ./?section=home");
}
?>