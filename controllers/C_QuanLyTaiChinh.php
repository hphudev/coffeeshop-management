
<?php
    include_once '../admin/manage-financial.php'
?>
<script type="text/javascript">
    var myLineChar = null;
    var myItemChar = null;
    function reportFinancialInDay(idElement)
    {
        // const DATA_COUNT = 5;
        // const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
        let func = {};
        func.name = 'financialInDay'; 
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);  
                response = JSON.parse(response);     
                let data = {
                    labels: ['Tổng thu', 'Tổng chi'],
                    datasets: [
                        {
                            label: 'Dataset 1',
                            data: [response['thu'], response['chi']],
                            backgroundColor: ['#6666ff', '#ff0066'],
                        }
                    ]
                };
                let config = {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Doanh thu'
                            },
                        }
                    },
                };
                let myChart = new Chart(
                    document.getElementById(idElement),
                    config
                );          
            }
        });
        
    }

    function reportFinancial(mainLabel, labelsTmp, dataGood, dataBad, dataAver, idElement)
    {
        let labels = labelsTmp;
        let data = {
            labels: labels,
            datasets: [
                {
                    label: 'Thu vào',
                    backgroundColor: 'rgb(0, 220, 255)',
                    fill: false,
                    borderColor: 'rgb(0, 153, 255)',
                    data: dataGood,
                },
                {
                    label: 'Chi ra',
                    backgroundColor: 'rgb(255, 220, 80)',
                    fill: false,
                    borderColor: 'rgb(255, 80, 80)',
                    data: dataBad,
                },
                {
                    label: 'Lợi nhuận',
                    backgroundColor: 'rgb(255, 255, 255)',
                    fill: false,
                    borderColor: '#00cc00',
                    data: dataAver,
                }
        ]
        };
        let config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: mainLabel
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 102, 0.1)'
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            // color: '#663300'
                        }
                    }
                }
            }
        };    
        // document.getElementById(idElement).innerHTML = "";
        // const
        if (!(myLineChar == null))
            myLineChar.destroy();
        myLineChar = new Chart(
            document.getElementById(idElement),
            config
        ); 
    }

    function reportFinancialItem(mainLabel, labelsTmp, dataGood, idElement)
    {
        const labels = labelsTmp;
        const data = {
            labels: labels,
            datasets: [
                {
                label: 'Số lần dùng món',
                data: dataGood,
                borderColor: '#fff',
                backgroundColor: '#6699ff',
                }
            ]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: mainLabel
                }
                }
            },
        };
        // if (!(myItemChar === null))
        //     myItemChar.destroy();
        let myItemChar = new Chart(
            document.getElementById(idElement),
            config
        ); 
    }

    function getDaysInMonth(month, year)
    {
        return new Date(year, month, 0).getDate();
    }

    function reportInMonth()
    {
        let func = {};
        func.name = 'financialOnMonth';
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);   
                response = JSON.parse(response);
                console.log(response);
                // console.log(response[1]['22']);
                let dataGood = [];
                let dataBad = [];
                let dataAver = [];
                let labelsTmp = [];
                let date = new Date();
                // console.log(new Date().getDate());
                // console.log(date.getDate());
                for (let i = 1; i < getDaysInMonth(date.getFullYear() , date.getMonth() + 1); i++)
                {
                    labelsTmp[i - 1] = (i).toString();
                    if (i > date.getDate())
                        continue;
                    dataGood [i - 1] = dataBad [i - 1] = dataAver[i - 1] = 0;
                    if (!(response[0][i] === null) && (response[0][i] > 0))
                        dataGood [i - 1] = response[0][i];
                    if (!(response[1][i] === null) && (response[1][i] > 0))
                        dataBad [i - 1] = response[1][i];
                    dataAver[i - 1] = dataGood[i - 1] - dataBad[i - 1];
                }
                console.log(dataBad);
                reportFinancial('Doanh thu trong tháng', labelsTmp, dataGood, dataBad, dataAver, 'myChart');
            }
        });
    }

    function reportInYear()
    {
        let func = {};
        func.name = 'financialInYear';
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);
                let dataGood = [];
                let dataBad = [];
                let dataAver = [];
                let labelsTmp = [];
                let date = new Date();
                // console.log(date.getMonth());
                for (let i = 1; i <= 12; i++)
                {
                    labelsTmp[i - 1] = (i).toString();
                    if (i > date.getMonth() + 1)
                        continue;
                    dataGood[i - 1] = dataBad[i - 1] = dataAver[i - 1] = 0;
                    if (!(response[0][i] === null) && response[0][i] > 0)
                    {
                        dataGood[i - 1] = response[0][i];
                    }
                    if (!(response[1][i] === null) && response[1][i] > 0)
                    {
                        dataBad[i - 1] = response[1][i];
                    }
                    dataAver[i - 1] = dataGood[i - 1] - dataBad[i - 1];
                }
                reportFinancial('Doanh thu trong năm', labelsTmp, dataGood, dataBad, dataAver, 'myChart');

            }
        });
    }

    function reportInWeek()
    {
        let func = {};
        func.name = 'financialInWeek';
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                // console.
                let dataGood = [];                
                let dataBad = [];                
                let dataAver = [];
                let labelsTmp = [];
                let date = new Date();
                for (let i = 0; i < response.length; i++)
                {
                    switch (i){
                        case 0:
                            labelsTmp[i] = "Thứ hai";
                            break;
                        case 1:
                            labelsTmp[i] = "Thứ ba";
                            break;
                        case 2:
                            labelsTmp[i] = "Thứ tư";
                            break;
                        case 3:
                            labelsTmp[i] = "Thứ năm";
                            break;
                        case 4:
                            labelsTmp[i] = "Thứ sáu";
                            break;
                        case 5:
                            labelsTmp[i] = "Thứ bảy";
                            break;
                        case 6:
                            labelsTmp[i] = "Chủ nhật";
                            break;
                        default: 
                            labelsTmp[i] = "Vô tận";
                            break;
                    }
                    // console.log(date.getDay());
                    if (i > date.getDay() - 1)
                        continue;
                    dataGood[i] = response[i]['thu'];
                    dataBad[i] = response[i]['chi'];
                    dataAver[i] = dataGood[i] - dataBad[i];
                }                
                reportFinancial("Doanh thu trong tuần", labelsTmp, dataGood, dataBad, dataAver, 'myChart');
            }
        });
    }

    function reportInTenYear()
    {
        let func = {};
        func.name = "financialInTenYear";
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                // console.log(response);
                response = JSON.parse(response);
                console.log(response);
                let dataGood = [];
                let dataBad = [];
                let dataAver = [];
                let labelsTmp = [];
                for (let i = 0; i < response.length; i++)
                {
                    dataGood[i] = dataBad[i] = dataAver[i] = 0;
                    labelsTmp[i] = response[i]['nam'];
                    if (!(response[i]['thu'] === null))
                        dataGood[i] = response[i]['thu'];
                    if (!(response[i]['chi'] === null))
                        dataBad[i] = response[i]['chi'];
                    dataAver[i] = dataGood[i] - dataBad[i];
                }
                reportFinancial("Doanh thu trong 10 năm", labelsTmp, dataGood, dataBad, dataAver, 'myChart');
            }
        });
    }

    function reportInTwentyYear()
    {
        let func = {};
        func.name = "financialInTwentyYear";
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                let dataGood = [];
                let dataBad = [];
                let dataAver = [];
                let labelsTmp = [];
                for (let i = 0; i < response.length; i++)
                {
                    dataGood[i] = dataBad[i] = dataAver[i] = 0;
                    labelsTmp[i] = response[i]['nam'];
                    if (!(response[i]['thu'] === null))
                        dataGood[i] = response[i]['thu'];
                    if (!(response[i]['chi'] === null))
                        dataBad[i] = response[i]['chi'];
                    dataAver[i] = dataGood[i] - dataBad[i];
                }
                reportFinancial("Doanh thu trong 10 năm", labelsTmp, dataGood, dataBad, dataAver, 'myChart');
            }
        });
    }

    function reportAllYear()
    {
        let func = {};
        func.name = "financialAllYear";
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);
                let dataGood = [];
                let dataBad = [];
                let dataAver = [];
                let labelsTmp = [];
                let tro_good = 0;
                let tro_bad = 0;
                let count = -1;
                while (tro_good < response[0].length || tro_bad < response[1].length)
                {
                    count++;
                    dataGood[count] = dataBad[count] = 0;
                    if (tro_good < response[0].length && tro_bad < response[1].length)
                    {
                        if (Number(response[0][tro_good]['nam'] < Number(response[1][tro_bad]['nam'])))
                        {
                            labelsTmp[count] = response[0][tro_good]['nam'];
                            dataGood[count] = response[0][tro_good]['thu'];
                            tro_good++;
                        }
                        else
                            if (Number(response[0]['nam'] > Number(response[1]['nam'])))
                            {
                                labelsTmp[count] = response[1][tro_bad]['nam'];
                                dataBad[count] = response[1][tro_bad]['chi'];
                                tro_bad++;
                            }
                    }
                    else
                    {
                        if (!(tro_good < response[0].length))
                        {
                            labelsTmp[count] = response[1][tro_bad]['nam'];
                            dataBad[count] = response[1][tro_bad]['chi'];
                            tro_bad++;
                        }
                        else
                        {
                            labelsTmp[count] = response[0][tro_good]['nam'];
                            dataGood[count] = response[0][tro_good]['thu'];
                            tro_good++;
                        }
                    }
                    dataAver[count] = dataGood[count] - dataBad[count];
                }
                reportFinancial("Doanh thu các năm", labelsTmp, dataGood, dataBad, dataAver, 'myChart');
            }
        });
    }

    function reportUseItemInDay()
    {
        let func = {};
        func.name = 'financialItemInDay';
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);
                let dataGood = [];
                let labelsTmp = [];
                for (let i = 0; i < response.length; i++)
                {
                    labelsTmp[i] = response[i]['TenMon'];
                    dataGood[i] = response[i]['SoLanDung'];
                }
                reportFinancialItem('Thống kê sử dụng món trong ngày', labelsTmp, dataGood, 'myChartItem');
            }
        });
    }

    function reportUseItemAllDay()
    {
        let func = {};
        func.name = 'financialItemAllDay';
        $.ajax({
            type: "POST",
            url: "../models/M_QL_TaiChinh.php",
            data: {func: JSON.stringify(func)},
            success: function (response) {
                console.log(response);
                // response = JSON.parse(response);
                let dataGood = [];
                let labelsTmp = [];
                for (let i = 0; i < response.length; i++)
                {
                    labelsTmp[i] = response[i]['TenMon'];
                    dataGood[i] = response[i]['SoLanDung'];
                }
                reportFinancialItem("Tổng thống kê sử dụng món", labelsTmp, dataGood, 'myChartItemAll');
            }
        });
    }

    reportUseItemInDay();
    // reportFinancialInYear();
    reportFinancialInDay('myChartPie');
    reportInYear();
    reportUseItemAllDay();
    // reportFinancial('Thống kê sử dụng món', ['Cà phê', 'Trà sữa'], [50, 100],  ,'myChartItem');
    // reportFinancialItem('myChartItem');
</script>