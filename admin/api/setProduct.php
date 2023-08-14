<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $prices = $_POST['prices'];
    $pricem = $_POST['pricem'];
    $pricel = $_POST['pricel'];
    $amount = $_POST['amount'];
    (new Product($path))->setProducts($name, $image, $prices, $pricem, $pricel, $amount);
    $result['status'] = "success";
    $result['data'] = "Thêm sản phẩm thành công";
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
