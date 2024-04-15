<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/crewmember/dashboard.css">
    <!-- Custon CSS for Sidebar -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/crewmember/sidebar.css">
    <!-- Custom CSS for Header -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/crewmember/header.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style.css">
    
</head>
<body>
    <div class="container">

        <!-- Header -->
        <?php include 'header.php' ?>

        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>
        
        <!-- Sidebar -->
        <!-- <aside class="sidebar">
            <button id="menu-btn">Button</button>
        </aside> -->
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <main class="main">

            <div class="cardBox">

                <div class="card">
                    <div>
                        <div class="numbers"><?=$workerco?></div>
                        <div class="cardName">Total Workers</div>
                    </div>

                    <div class="iconBx totalWorkers">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?=$faccep?></div>
                        <div class="cardName">Accepted Requests</div>
                        <small class="text-muted">Last 14 days</small>

                    </div>

                    <div class="iconBx verifiedWorkers">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?=$tick30Count?></div>
                        <div class="cardName">Raised Tickets</div>
                        <small class="text-muted">Last 14 days</small>

                    </div>

                    <div class="iconBx pendingWorkers">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Messages</div>
                    </div>

                    <div class="iconBx messages">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

            </div>


            <!-- ================ Worker Details List ================= -->
            <div class="details">
                <div class="recentWorkers">
                    <div class="cardHeader">
                        <h2>Recently Accepted Requests</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>ID</td>
                                <td>Payment</td>
                                <td>Payment Status</td>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach ($data["eightacc"] as $acc):?>

                            <tr>
                                <td><?=$acc->title?></td>
                                <td><?=$acc->id?></td>
                                <td><?=$acc->budget*0.05?></td>
                                <td><span class="status delivered"><?=$acc->payment_stat?></span></td>
                            </tr>

                        <?php endforeach;?>


<!--                            <tr>-->
<!--                                <td>Dell Laptop</td>-->
<!--                                <td>$110</td>-->
<!--                                <td>Due</td>-->
<!--                                <td><span class="status pending">Pending</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Apple Watch</td>-->
<!--                                <td>$1200</td>-->
<!--                                <td>Paid</td>-->
<!--                                <td><span class="status return">Return</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Addidas Shoes</td>-->
<!--                                <td>$620</td>-->
<!--                                <td>Due</td>-->
<!--                                <td><span class="status inProgress">In Progress</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Star Refrigerator</td>-->
<!--                                <td>$1200</td>-->
<!--                                <td>Paid</td>-->
<!--                                <td><span class="status delivered">Delivered</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Dell Laptop</td>-->
<!--                                <td>$110</td>-->
<!--                                <td>Due</td>-->
<!--                                <td><span class="status pending">Pending</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Apple Watch</td>-->
<!--                                <td>$1200</td>-->
<!--                                <td>Paid</td>-->
<!--                                <td><span class="status return">Return</span></td>-->
<!--                            </tr>-->
<!---->
<!--                            <tr>-->
<!--                                <td>Addidas Shoes</td>-->
<!--                                <td>$620</td>-->
<!--                                <td>Due</td>-->
<!--                                <td><span class="status inProgress">In Progress</span></td>-->
<!--                            </tr>-->
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Registrations</h2>
                    </div>

                    <table>

                        <?php foreach ($data["eight"] as $reg):?>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="<?= ROOT ?>/assets/images/profileImages/<?=$reg->profile_image?>" alt=""></div>
                                </td>
                                <td>
                                    <h4><?=$reg->name?> <br> <span><?=$reg->status?></span></h4>
                                </td>
                            </tr>

                        <?php endforeach;?>


<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer01.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>Amit <br> <span>India</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer02.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>David <br> <span>Italy</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer01.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>Amit <br> <span>India</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer02.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>David <br> <span>Italy</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer01.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>Amit <br> <span>India</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer01.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>David <br> <span>Italy</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
<!---->
<!--                        <tr>-->
<!--                            <td width="60px">-->
<!--                                <div class="imgBx"><img src="--><?php //= ROOT ?><!--/assets/tempory_images_for_crewmember/customer02.jpg" alt=""></div>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <h4>Amit <br> <span>India</span></h4>-->
<!--                            </td>-->
<!--                        </tr>-->
                    </table>
                </div>
            </div>


            <div class="charts">
                <div class="chart-card" style="width: 50%">
                    <h2 class="chart-title">Registered Users</h2>
                    <div id="bar-chart"></div>
                </div>

                <div class="chart-card" style="width: 50%">
                    <h2 class="chart-title">Tickets</h2>
                    <div id="area-chart"></div>
                </div>
            </div>

        </main>
        <!-- End of Main Content -->
    </div>

    <!-- Custom JS file -->
    <script src="<?= ROOT ?>/assets/js/crewmember/crewmember.js"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
                    name: 'Archived Tickets',
                    data: <?= json_encode(array_values($tickarchmonths)) ?>,
                },
                {
                    name: 'Raised Tickets',
                    data: <?= json_encode(array_values($tickmonths)) ?>,
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
            labels: <?= json_encode(array_keys($tickarchmonths)) ?>,
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
                        colors: '#000'
                    },
                },
            },
            yaxis: [
                {
                    title: {
                        text: 'Archived Tickets',
                        style: {
                            color: '#000'
                        },
                    },
                    labels: {
                        style: {
                            colors: ['#000']
                        },
                    },
                },
                {
                    opposite: true,
                    title: {
                        text: 'Raised Tickets',
                        style: {
                            color: '#000'
                        },
                    },
                    labels: {
                        style: {
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