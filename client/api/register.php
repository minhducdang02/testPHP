<?php
session_start();
require_once './api.php';
$email = "";
$pass = "";
$name = "";
$result = [];
if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $check = (new User($path))->getUsers("email='$email'");
    if($check->num_rows == 0)
    {
        (new User($path))->setUsers($email, $pass, $name);
        $result['status'] = "success";
        $result['data'] = "Đăng ký tài khoản thành công";
    }
    else
    {
        $result['status'] = "error";
        $result['data'] = "Trùng email, vui lòng thử một email khác";
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>