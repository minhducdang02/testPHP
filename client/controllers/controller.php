<?php
require_once "./models/model.php";
session_start();
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//so luong gio hang
$count = "";
if (isset($_SESSION['cart'])) {
    $count = 0;
    foreach ($_SESSION['cart'] as $row) {
        $count += $row['amount'];
    }
}
switch ($action) {
    case '':
        $productsTop = (new Product())->getProducts("1=1", "id DESC", 4);
        $products = (new Product())->getProducts();
        require './includes/header.php';
        require './includes/slideShow.php';
        require './views/index.php';
        require './includes/footer.php';
        break;
    case 'cart':
        require './includes/header.php';
        require './views/cart.php';
        require './includes/footer.php';
        break;
    case 'user':
        $user_id = $_SESSION['user']['id'];
        $orders = (new Order())->getOrders("","id_user=$user_id","id desc");
        require './includes/header.php';
        require './views/user.php';
        require './includes/footer.php';
        break;
    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        header("location: ./");
        break;
    default:
        echo "<div style='text-align: center'>
            <img width='50%' src='./src/img/404.jpg'>
        </div>";
}
