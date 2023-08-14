<div class="product_admin">
<div><button type="button" class="btn btn-primary btn-block add-product">Thêm sản phẩm</button></div>
<table class="table1">
    <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá size S</th>
            <th>Giá size M</th>
            <th>Giá size L</th>
            <th>Số lượng còn</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $row) { ?>
            <tr>
                <td><img src="<?php echo $row['image']?>" alt="product"></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo number_format($row['price_s'],0,',','.')?>đ</td>
                <td><?php echo number_format($row['price_m'],0,',','.')?>đ</td>
                <td><?php echo number_format($row['price_l'],0,',','.')?>đ</td>
                <td><?php echo $row['amount']?></td>
                <td>
                    <div><button data-id="<?php echo $row['id']?>" type="button" class="btn btn-warning btn-block repair-product">Sửa</button></div>
                    <div><button data-id="<?php echo $row['id']?>" type="button" class="btn btn-danger btn-block delete-product">Xóa</button></div>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>
</div>