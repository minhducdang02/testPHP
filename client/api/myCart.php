<?php
require_once './api.php';
session_start();
$arr = [
    "status" => "error",
    "data" => "Lỗi"
];
if (isset($_SESSION['user'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $row) {
            $id_pr = explode("-", $row['id'])[0];
            $id_user = $_SESSION['user']['id'];
            $size = $row['size'];
            $sugar = $row['sugar'];
            $price = $row['price'];
            $amount = $row['amount'];
            $check = (new Cart($path))->getCarts("id_user=$id_user AND id_pr=$id_pr", "", "");
            if ($check->num_rows == 0) {
                (new Cart($path))->setCart($id_pr, $id_user, $size, $sugar, $price, $amount);
            } else {
                (new Cart($path))->updateCart($id_pr, $id_user, $size, $sugar, $price, $amount);
            }
        }
    } else {
        $id_user = $_SESSION['user']['id'];
        $check = (new Cart($path))->getCarts("id_user=$id_user");
        foreach ($check as $row) {
            $product = (new Product($path))->getProducts("id={$row['id_pr']}");
            $product = $product->fetch_assoc();
            $key = "{$row['id_pr']}-{$row['sugar']}-{$row['size']}";
            $size = $row['size'];
            $_SESSION['cart'][$key]['id'] = $row['id_pr'];
            $_SESSION['cart'][$key]['name'] = $product['name'];
            $_SESSION['cart'][$key]['image'] = $product['image'];
            $_SESSION['cart'][$key]['price'] = ($size == 's') ? $product['price_s'] : (($size == 'l') ? $product['price_l'] : $product['price_m']);
            $_SESSION['cart'][$key]['sugar'] = $row['sugar'];
            $_SESSION['cart'][$key]['size'] = $row['size'];
            $_SESSION['cart'][$key]['amount'] = $row['amount'];
        }
    }
    $arr = [
        "status" => "success",
        "data" => $_SESSION['cart']
    ];
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
