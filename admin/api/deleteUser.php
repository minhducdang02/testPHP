<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $id_orders = (new Order($path))->getOrders('',"id_user=$id");
    foreach($id_orders as $row)
    {
        (new Order($path))->deleteOrderLists("id_order={$row['id']}");
        (new Order($path))->deleteOrderDetails("id_order={$row['id']}");
    }
    (new Order($path))->deleteOrders("id_user=$id");
    (new User($path))->deleteUsers($id);
    $result = [
        "status" => "success",
        "data" => "Xóa tài khoản thành công"
    ];
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);