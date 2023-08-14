<?php
require_once './api.php';
session_start();
$arr = [];
//delete cart
if(isset($_POST['action']))
{
    $key = $_POST['key'];
    if($_POST['action'] == "delete")
    {
        unset($_SESSION['cart'][$key]);
        if(count($_SESSION['cart']) == 0)
        {
            unset($_SESSION['cart']);
        }
        if(isset($_SESSION['user']))
        {
            $id_pr = explode("-", $key)[0];
            $id_user = $_SESSION['user']['id'];
            (new Cart($path))->deleteCart("id_user=$id_user AND id_pr = $id_pr");
        }
    $arr['status'] = "success";
    $arr['data'] = $key.'-'.$_POST['action'];
    }
    die();
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sugar = $_POST['sugar'];
    $size = $_POST['size'];
    $amount = $_POST['amount'];
    $key = "$id-$sugar-$size";
    $cartDetail = (new Product($path))->getProducts("id = $id");
    $cartDetail = $cartDetail->fetch_assoc();
    if (!isset($_SESSION['cart']) || !isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['id'] = $id;
        $_SESSION['cart'][$key]['name'] = $cartDetail['name'];
        $_SESSION['cart'][$key]['image'] = $cartDetail['image'];
        $_SESSION['cart'][$key]['price'] = ($size == 's') ? $cartDetail['price_s'] : (($size == 'l') ? $cartDetail['price_l'] : $cartDetail['price_m']);
        $_SESSION['cart'][$key]['sugar'] = $sugar;
        $_SESSION['cart'][$key]['size'] = $size;
        $_SESSION['cart'][$key]['amount'] = $amount;
    } else {
        $_SESSION['cart'][$key]['amount'] += $amount;
    }
    $arr["status"] = "success";
    $arr['data'] = json_encode($cartDetail, JSON_UNESCAPED_UNICODE);
} else {
    $arr['status'] = "error";
}
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
