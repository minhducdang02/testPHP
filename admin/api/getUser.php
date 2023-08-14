<?php
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $user = (new User($path))->getUsers("id=$id");
    $result = [
        "status" => "success",
        "data" => $result
    ];
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>