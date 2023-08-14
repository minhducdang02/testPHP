
<table class="table1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Thời gian đặt</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($orders as $row) {
            $user = (new User())->getUsers("id={$row['id_user']}")->fetch_assoc(); ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo number_format($row['price'],0,',','.') ?>đ</td>
                <td class="<?php echo (($row['status'] == 0) ? "wait" : (($row['status'] == 1) ? "success" : "lost")) ?>"><?php echo (($row['status'] == 0) ? "Đang chờ" : (($row['status'] == 1) ? "Xong" : "Đã hủy")) ?></td>
                <td>
                    <div><button type="button" data-id="<?php echo $row['id'] ?>" class="btn btn-primary btn-block view-order">Xem</button></div>
                </td>
                
            </tr>
        <?php }
        ?>
    </tbody>
</table>