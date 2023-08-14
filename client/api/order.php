<?php
session_start();
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Vui lòng đăng nhập để sử dụng chức năng này"
];
if (isset($_SESSION['user'])) {
    $id_user = $_SESSION['user']['id'];
    $tz = 'Asia/Ho_Chi_Minh';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp(time());
    $date = $dt->format("Y-m-d H:i:s");
    $price = 0;
    foreach ($_SESSION['cart'] as $row) {
        $price += (int)$row['amount'] * (float)$row['price'];
    }
    (new Order($path))->setOrders($id_user, $date, $price, 0);
    $id_order = (new Order($path))->getOrders("", "id_user=$id_user AND date='$date'");
    $id_order = $id_order->fetch_assoc();
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    (new Order($path))->setOrderDetails($id_order['id'], $name, $phone, $address, $note);
    $cart = (new Cart($path))->getCarts("id_user=$id_user");
    foreach($cart as $row){
        (new Order($path))->setOrderList($id_order['id'], $row['id_pr'], $row['sugar'], $row['size'], $row['amount'], $row['price']);
    }
    (new Cart($path))->deleteCart("id_user=$id_user");
    unset($_SESSION['cart']);
    $result = [
        "status" => "success",
        "data" => "Đặt hàng thành công"
    ];
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
