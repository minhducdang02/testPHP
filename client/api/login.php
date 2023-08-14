<?php
session_start();
require_once './api.php';
if(isset($_POST['email']))
{
    $result = [];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $check = (new User($path))->getUsers("email='$email' AND pass='$pass'");
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
        $_SESSION['user']['name'] = $check['name'];
        $_SESSION['user']['id'] = $check['id'];
        $_SESSION['user']['email'] = $check['email'];
        $_SESSION['user']['pass'] = $check['pass'];
        $_SESSION['user']['phone'] = $check['phone'];
        $_SESSION['user']['address'] = $check['address'];
        $_SESSION['user']['level'] = $check['level'];
        if (isset($_SESSION['user']) && isset($_SESSION['cart'])) {
            $check = (new Cart($path))->getCarts("id_user={$check['id']}");
            if($check->num_rows != 0)
            {
                unset($_SESSION['cart']);
            }
        }
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
?>