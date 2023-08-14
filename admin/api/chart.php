<!-- <?php
require_once './api.php';
$tz = 'Asia/Ho_Chi_Minh';
if (isset($_POST['type'])) {
    if ($_POST['type'] == "month") {
        $arr = [
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0
        ];
        $check = (new Order($path))->getOrders();
        foreach ($check as $row) {
            $dt = new DateTime(explode(" ",$row['date'])[0], new DateTimeZone($tz));
            $month = date("m", strtotime($dt->format("Y-m-d")));
            $arr["$month"] += $row['price'];
        }
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
} -->
