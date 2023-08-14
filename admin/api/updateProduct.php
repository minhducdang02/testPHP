<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $prices = $_POST['prices'];
    $pricem = $_POST['pricem'];
    $pricel = $_POST['pricel'];
    $amount = $_POST['amount'];
    (new Product($path))->updateProduct($id, $name, $image, $prices, $pricem, $pricel, $amount);
    $result['status'] = "success";
    $result['data'] = "Thành công";
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>