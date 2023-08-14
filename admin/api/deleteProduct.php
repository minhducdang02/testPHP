<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    (new Product($path))->deleteProduct($id);
    $result['status'] = "success";
    $result['data'] = "Xóa sản phẩm thành công";
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>