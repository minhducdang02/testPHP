<table class="table1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($users as $row){ ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td>
                <div><button type="button" data-id="<?php echo $row['id']?>" class="btn btn-danger btn-block delete-user">Xóa</button></div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>