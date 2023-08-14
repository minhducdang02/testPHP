<div class="my-order">
    <table class="cart">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <!-- <th>Thao tác</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($orders as $row) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td class="<?php echo (($row['status'] == 0) ? "waitting" : (($row['status'] == 1) ? "success" : "error")) ?>"><?php echo (($row['status'] == 0) ? "Chờ xác nhận" : (($row['status'] == 1) ? "Thành công" : "Đã hủy")) ?></td>
                    <td><?php echo number_format($row['price'],0,',','.') ?>đ</td>
                    <!-- <td class="error"><div class="btn-lost-order"><?php if($row['status'] == 0) echo "Hủy đơn" ?></div></td> -->
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>