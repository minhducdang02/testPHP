<div id="cart">
    <?php
    if (!isset($_SESSION['cart'])) { ?>
        <div class="empty-cart"><img src="./src/img/empty-cart.png" alt=""></div>
    <?php
    } else { ?>
        <table cellspacing="0" class="cart">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Kích cỡ</th>
                    <th>Chất liệu kính</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumPrice = 0;
                foreach ($_SESSION['cart'] as $row => $val) {
                    $sumPrice += $val['price'] * $val['amount'];
                    $name = $val['name'];
                    $size = $val['size'];
                    $sugar = ($val['sugar'] == 1) ? "Sapphire" : "Mineral Glass";
                    $price = number_format($val['price'], 0, ',', '.') . " đ";
                ?>
                    <tr>
                        <td><img src="<?php echo $val['image'] ?>" alt="product"></td>
                        <td class="upper"><?php echo $name ?></td>
                        <td class="upper"><?php echo $size ?></td>
                        <td><?php echo $sugar ?></td>
                        <td><?php echo $val['amount'] ?></td>
                        <td><?php echo $price ?></td>
                        <td data-id="<?php echo $row ?>" class="delete-cart">Hủy sản phẩm</td>
                    </tr>
                <?php
                }
                $sumPrice = number_format($sumPrice, 0, ",", '.');
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <div class="order btn" id="order"><i class="fa-solid fa-cart-flatbed"></i> Đặt hàng</div>
                    </td>
                    <td colspan="5">Tổng thành tiền: <?php echo $sumPrice ?> VNĐ</td>
                </tr>
            </tfoot>
        </table>
    <?php
    }
    ?>
</div>