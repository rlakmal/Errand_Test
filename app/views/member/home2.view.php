<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Dashboard</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>


<!-- Siraj Section -->
<section id="main" class="main">
    <h1>Dashboard</h1>

    <div class="insights">
        <div class="income">
            <div class="middle">
                <h1>Total Income</h1>
                <span class="material-symbols-sharp">stacked_line_chart</span>
            </div>
            <h1>Rs.10,558/=</h1>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- END OF Income -->

        <div class="posted-jobs">
            <div class="middle">
                <h1>Posted Jobs</h1>
                <span class="material-symbols-sharp">bar_chart</span>

            </div>
            <h1>80</h1>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- END OF SALES -->

        <div class="completed-jobs">
            <div class="middle">
                <h1>Raised Tickets</h1>
                <span class="material-symbols-sharp">analytics</span>

            </div>
            <h1><?=$tick30Count?></h1>
            <small class="text-muted">Last 14 days</small>
        </div>
        <!-- END OF Expenses -->

        <div class="adminCrew">
            <div class="middle">
                <h1>Crew Members</h1>
                <span class="material-symbols-sharp">groups</span>
            </div>
            <h1>25</h1>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- END OF CREW MEMBERS -->

    </div>
    <!----------- END OF INSIGHTS ----------->

    <div class="charts">
        <div class="chart-card">
            <h2 class="chart-title">Registered Users</h2>
            <div id="bar-chart"></div>
        </div>

        <div class="chart-card">
            <h2 class="chart-title">Job Requests</h2>
            <div id="area-chart"></div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
<script>

    // -------------- Charts -------------
    // BAR CHART
    var barChartOptions = {
        series: [{
            data: [<?=$emp?>, <?=$veri?>, <?=$unveri?>],
            name: "Registered",
        }],
        chart: {
            type: 'bar',
            height: 350 ,
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Employers' , 'Verified Workers', 'Non Verified Workers',
            ],
        }
    };

    var chart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
    chart.render();

    // AREA CHART
    const areaChartOptions = {
        series: [
            {
                name: 'Completed Jobs',
                data: [11, 32, 45, 32, 34, 52, 41],
            },
            {
                name: 'Posted Jobs',
                data: [31, 40, 58, 51, 42, 109, 100],
            },
        ],
        chart: {
            type: 'area',
            background: 'transparent',
            height: 350,
            stacked: false,
            toolbar: {
                show: false,
            },
        },
        colors: ['#00ab57', '#d50000'],
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        dataLabels: {
            enabled: false,
        },
        fill: {
            gradient: {
                opacityFrom: 0.4,
                opacityTo: 0.1,
                shadeIntensity: 1,
                stops: [0, 100],
                type: 'vertical',
            },
            type: 'gradient',
        },
        grid: {
            //   borderColor: '#55596e',
            borderColor: '#e7e4e4',
            yaxis: {
                lines: {
                    show: false,
                },
            },
            xaxis: {
                lines: {
                    show: true,
                },
            },
        },
        legend: {
            labels: {
                // colors: '#f5f7ff',
                colors: '#000'
            },
            show: false,
            position: 'top',
        },
        markers: {
            size: 6,
            strokeColors: '#1b2635',
            strokeWidth: 3,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            axisBorder: {
                color: '#55596e',
                show: true,
            },
            axisTicks: {
                color: '#55596e',
                show: true,
            },
            labels: {
                offsetY: 5,
                style: {
                    //   colors: '#f5f7ff',
                    colors: '#000'
                },
            },
        },
        yaxis: [
            {
                title: {
                    text: 'Completed Jobs',
                    style: {
                        // color: '#f5f7ff',
                        color: '#000'
                    },
                },
                labels: {
                    style: {
                        // colors: ['#f5f7ff'],
                        colors: ['#000']
                    },
                },
            },
            {
                opposite: true,
                title: {
                    text: 'Posted Jobs',
                    style: {
                        // color: '#f5f7ff',
                        color: '#000'
                    },
                },
                labels: {
                    style: {
                        // colors: ['#f5f7ff'],
                        colors: ['#000']
                    },
                },
            },
        ],
        tooltip: {
            shared: true,
            intersect: false,
            theme: 'dark',
        },
    };

    const areaChart = new ApexCharts(
        document.querySelector('#area-chart'),
        areaChartOptions
    );
    areaChart.render();

</script>
</body>

</html>