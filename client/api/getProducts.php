<?php
require_once './api.php';
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $result = (new Product($path))->getProducts("id=$id");
    echo json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);
}
else
echo "fail";
?>