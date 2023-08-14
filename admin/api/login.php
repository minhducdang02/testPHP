<?php
session_start();
require_once './api.php';
$result = [
    "status" => "error",
    "data" => "Có lỗi xảy ra"
];
if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $check = (new User($path))->getUsers("email='$email' AND pass='$pass' AND level=1");
    if($check->num_rows == 0)
    {
        $result['status'] = "error";
        $result['data'] = "Sai tài khoản hoặc mật khẩu";
    }
    else
    {
        $result['status'] = "success";
        $result['data'] = "Đăng nhập thành công";
        $check = $check->fetch_assoc();
        //tao phien dang nhap
        $_SESSION['admin']['name'] = $check['name'];
        $_SESSION['admin']['id'] = $check['id'];
        $_SESSION['admin']['email'] = $check['email'];
        $_SESSION['admin']['pass'] = $check['pass'];
        $_SESSION['admin']['phone'] = $check['phone'];
        $_SESSION['admin']['address'] = $check['address'];
        $_SESSION['admin']['level'] = $check['level'];
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>