<div class="row setcontent_admin">
    <div class="col-sm-6">
        <div>
            <div class="orders-today">
                <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo $countOrder ?></h2>
                    </th>
                    <tr>
                        <td><h5>Số lần đặt hàng hôm nay</h5></td>
                    </tr>  
                </table>
            </div>
            <br>
            <div class="orders-success">
                <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo $countOrderSuccess ?></h2>
                    </th>
                    <tr>
                        <td><h5>Số lần đặt thành công hôm nay</h5></td>
                    </tr>  
                </table>
            </div>
            <br>
            <div class="cancel-today" >
                <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo $countOrderLost ?></h2>
                    </th>
                    <tr>
                        <td><h5>Số lần hủy đặt hôm nay</h5></td>
                    </tr>  
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div>
            <div class="sell">
                <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo number_format($sale,0,',','.') ?> VND</h2>
                    </th>
                    <tr>
                        <td><h5>Tổng doanh số</h5></td>
                    </tr>  
                </table> 
            </div>
            <br>
            <div class="orders">
                <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo $count ?></h2>
                    </th>
                    <tr>
                        <td><h5>Tổng lượt đặt</h5></td>
                    </tr>  
                </table> 
            </div>
            <br>
            <div class="sell-today" >
            <table border="1" class="table_tk">
                    <th colspan="2">
                    <h2><?php echo number_format($saleToday,0,',','.') ?> VND</h2>
                    </th>
                    <tr>
                        <td><h5>Doanh số hôm nay</h5></td>
                    </tr>  
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row chart">
    <div class="col-12">
        <canvas id="my-chart"></canvas>
    </div>
</div> -->