<?php
require_once './api.php';
if(isset($_POST['action']))
{
    $id = $_POST['id'];
    $action = $_POST['action'];
    (new Order($path))->updateOrders($id, $action);
}
?>