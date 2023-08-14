<?php
require_once './api.php';
if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];
    $orderList = (new Order($path))->getOrderList("", "id_order=$id_order");
    $order = (new Order($path))->getOrders("", "id=$id_order")->fetch_assoc();
    $orderDetail = (new Order($path))->getOrderDetails("id_order=$id_order")->fetch_assoc();
    $user = (new User($path))->getUsers("id={$order['id_user']}")->fetch_assoc();
}
?>
<div class="title">
    <div>Thông tin đơn hàng</div>
    <i class="fa-solid fa-xmark" id="close-modal"></i>
</div>
<div class="flex">
    <div class="ship-info">
        <div class="label">Tên người nhận: <?php echo $orderDetail['name'] ?></div>
        <div class="label">Số điện thoại: <?php echo $orderDetail['phone'] ?></div>
        <div class="label">Địa chỉ: <?php echo $orderDetail['address'] ?></div>
        <div class="label">Ghi chú: <?php echo $orderDetail['note'] ?></div>
    </div>
    <div class="product-info">
        <?php
        foreach ($orderList as $row) {
            $product = (new Product($path))->getProducts("id={$row['id_pr']}")->fetch_assoc();
        ?>
            <div class="container">
                <img src="<?php echo $product['image'] ?>" alt="photo">
                <div class="info">
                    <div class="name"><?php echo $product['name'].'('.$row['size'].')' ?></div>
                    <div class="info"><?php echo (($row['sugar'] == 1) ? "Sapphire" : "Mineral Glass") ?></div>
                    <div class="price"><?php echo $row['amount'].' x '.number_format($row['price'],0,',','.').'đ' ?></div>
                </div>
            </div>
            <br>
        <?php }
        ?>
    </div>
</div>
<div class="info">
    <table>
        <thead>
            <tr>
                <th>Người đặt</th>
                <th>Email</th>
                <th>Thời gian đặt</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $order['date'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="bill">Tổng cộng: <?php echo number_format($order['price'],0,',','.')?>đ</div>
<div class="flex">
    <button type="button" class="btn btn-success" data-id="<?php echo $order['id'] ?>" id="alow-order">Duyệt đơn hàng</button>
    <button type="button" class="btn btn-danger" data-id="<?php echo $order['id'] ?>" id="unalow-order">Hủy đơn hàng</button>
</div>