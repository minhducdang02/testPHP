<?php
require_once './api.php';
if(isset($_POST['email']))
{
    $result = [];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $user = (new User($path))->getUsers("email='$email'");
    if($user->num_rows != 0)
    {
        $result['status'] = "error";
        $result['data'] = "Thông tin bị trùng hãy thử điền thông tin khác";
    }
    else
    {
        (new User($path))->setUsers($email, $pass, $name);
        $result['status'] = "success";
        $result['data'] = "Đăng kí tài khoản thành công";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
?>