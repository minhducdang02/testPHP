let xValues = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
let sell = [];
$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "./api/chart.php",
        data: { type: 'month' },
        success: function (response) {
            let obj = JSON.parse(response);
            console.log(obj);
            for (i = 1; i <= 12; i++) {
                sell[i-1] = (i <= 9) ? obj["0"+i] : obj[""+i];
            }
            new Chart("my-chart", {
                type: 'bar',
                data: {
                    labels: xValues,
                    datasets: [
                        {
                            label: 'Doanh thu(đồng)',
                            data: sell,
                            borderColor: 'blue',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true
                }
            });
        }
    });
});