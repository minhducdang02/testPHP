<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $check = (new Product($path))->getProducts("id=$id");
    if($check->num_rows == 0)
    {
        $result['status'] = "error";
        $result['data'] = "Không tìm thấy sản phẩm";
    }
    else
    {
        $result['status'] = "success";
        $check = $check->fetch_assoc();
        
        $result['data'] = $check;
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>