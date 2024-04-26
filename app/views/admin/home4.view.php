<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/home.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

    </style>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- Content -->
<section id="main" class="main" style="margin-top: 15px; height: fit-content;">
    <h2 class="topic">Administrator Home</h2>
    <div class="insights">
        <div class="income">
            <div class="middle">
                <h1>Total Income</h1>
                <span class="material-symbols-sharp">stacked_line_chart</span>
            </div>
            <h1>Rs.<?=$data["sum"]?>/=</h1>
            <small class="text-muted">Last 7 days</small>
        </div>
        <!-- END OF Income -->

        <div class="posted-jobs">
            <div class="middle">
                <h1>Posted Jobs</h1>
                <span class="material-symbols-sharp">analytics</span>
            </div>
            <h1><?=$data["jobs30"]?></h1>
            <small class="text-muted">Last 30 days</small>
        </div>
        <!-- END OF SALES -->

        <div class="completed-jobs">
            <div class="middle">
                <h1>Job Acceptances</h1>
                <span class="material-symbols-sharp">bar_chart</span>
            </div>
            <h1><?=$data["req30"]?></h1>
            <small class="text-muted">Last 30 days</small>
        </div>
        <!-- END OF Expenses -->

        <div class="adminCrew">
            <div class="middle">
                <h1>Crew Members</h1>
                <span class="material-symbols-sharp">groups</span>
            </div>
            <h1><?=count($data["members"])?></h1>
            <small class="text-muted">Currently</small>
        </div>
    </div>

        <?php
        $categories = array_unique(array_column($workers, 'category'));
        $categoryCounts = array_count_values(array_column($workers, 'category'));

        // Sample data for registered users bar chart
        $months = [];
        $employerData = [];
        $workerData = [];

        // Assuming $users have user objects, each with ->created(datetime)
        foreach ($users as $user) {
            $createdMonth = date('F', strtotime($user->created));
            $userType = ($user->status == 'employer') ? 'Employer' : 'Worker';

            if (!in_array($createdMonth, $months)) {
                $months[] = $createdMonth;
            }

            if (!isset($employerData[$createdMonth])) {
                $employerData[$createdMonth] = 0;
            }

            if (!isset($workerData[$createdMonth])) {
                $workerData[$createdMonth] = 0;
            }

            if ($userType == 'Employer') {
                $employerData[$createdMonth]++;
            } elseif ($userType == 'Worker') {
                $workerData[$createdMonth]++;
            }
        }
        ?>

        <?php
        // Update thirdChartData with data from empreqpaysums
        $thirdChartData = [
            'labels' => array_keys($data["empreqpaysums"]),
            'datasets' => [
                [
                    'label' => 'Amount',
                    'data' => array_values($data["empreqpaysums"]),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];
        ?>

        <div  style="flex-direction: column; display: flex; overflow-y: scroll; width: 100% ; position: relative; height: 800px">
            <div class="charts-row">
                <div class="chart-container" style="width: 40%;">
                    <canvas id="thirdChart" style="width: 100%; height: 100%;"></canvas>
                    <h2>Employer Request Payments</h2>
                </div>

                <div class="chart-container" style="width: 40%;">
                    <canvas id="registeredUsersChart" style="width: 100%; height: 100%;"></canvas>
                    <h2>User Registration</h2>
                </div>
            </div>

            <div class="charts-row" style="margin-bottom: 300px">
                <div class="chart-container" style="width: 40%;">
                    <canvas id="jobDistributionChart" style="width: 100%; height: 100%;"></canvas>
                    <h2>Categories of Worker</h2>
                </div>

                <div class="chart-container" style="width: 40%;">
                    <canvas id="fourthChart" style="width: 100%; height: 100%;"></canvas>
                    <h2>Job Locations</h2>
                </div>
            </div>

        </div>




</section>

<!-- POPUP -->
<div class="popup-report">
    <!-- Popup content here -->
</div>

<style>
    /*.chart-container {*/
    /*    width: 1200px;*/
    /*    height: 600px;*/
    /*    float: left;*/
    /*    margin-top: 50px;*/
    /*    margin-right: 50px;*/
    /*}*/

    .stats {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .stat-box {
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .stat-number {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sample data for charts
        var registeredUsersData = {
            labels: <?= json_encode($months) ?>,
            datasets: [{
                label: 'Employers',
                data: <?= json_encode(array_values($employerData)) ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
                {
                    label: 'Workers',
                    data: <?= json_encode(array_values($workerData)) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]
        };

        var jobDistributionData = {
            labels: <?= json_encode(array_keys($categoryCounts)) ?>,
            datasets: [{
                label: 'Workers Distribution',
                data: <?= json_encode(array_values($categoryCounts)) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        var thirdChartData = <?= json_encode($thirdChartData) ?>;

        // Data for fourth chart
        var fourthChartData = {
            labels: <?= json_encode(array_keys($data["joblocationcounts"])) ?>, // Use array keys as labels
            datasets: [{
                label: 'Job Location Counts',
                data: <?= json_encode(array_values($data["joblocationcounts"])) ?>, // Use array values as data
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        };

        // Initialize and render charts
        var registeredUsersChart = new Chart(document.getElementById('registeredUsersChart').getContext('2d'), {
            type: 'bar',
            data: registeredUsersData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var jobDistributionChart = new Chart(document.getElementById('jobDistributionChart').getContext('2d'), {
            type: 'doughnut',
            data: jobDistributionData
        });

        var thirdChart = new Chart(document.getElementById('thirdChart').getContext('2d'), {
            type: 'line',
            data: thirdChartData
        });

        var fourthChart = new Chart(document.getElementById('fourthChart').getContext('2d'), {
            type: 'bar',
            data: fourthChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Add other chart initializations here
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
