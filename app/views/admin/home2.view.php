<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .nue {
            overflow-y: scroll;
        }

        .curve-bar {
            position: relative;
            height: 20px;
            width: 100%;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .filling-bar-verified {
            position: absolute;
            height: 100%;
            width: 0;
            background-color: #4CAF50;
            border-radius: 10px;
            animation: fillAnimationVerified 2s ease-in;
        }

        .filling-bar-completed {
            position: absolute;
            height: 100%;
            width: 0;
            background-color: #4CAF50;
            border-radius: 10px;
            animation: fillAnimationCompleted 2s ease-in;
        }

        @keyframes fillAnimationVerified {
            from {
                width: 0;
            }

            to {
                width: <?= round($verifiedpercentage) ?>%;
            }
        }

        @keyframes fillAnimationCompleted {
            from {
                width: 0;
            }

            to {
                width: 60%; /* Adjust the completed jobs percentage accordingly */
            }
        }
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
<section id="main" class="main nue">
    <h2>Administrator Home</h2>
    <div class="stats">
        <div class="stat-box">
            <h3>Total Workers</h3>
            <p class="stat-number"><?= count($workers) ?></p>
        </div>
        <div class="stat-box">
            <h3>Total Employers</h3>
            <p class="stat-number"><?= count($employers) ?></p>
        </div>
        <div class="stat-box">
            <h3>Total Jobs Posted</h3>
            <p class="stat-number"><?= count($jobs) ?></p>
        </div>
        <div class="stat-box">
            <h3>Verified Workers</h3>
            <div class="curve-bar">
                <div class="filling-bar-verified"></div>
            </div>
            <p class="stat-number"><?= round($verifiedpercentage) ?>%</p>
        </div>
        <div class="stat-box">
            <h3>Completed Jobs</h3>
            <div class="curve-bar">
                <div class="filling-bar-completed"></div>
            </div>
            <p class="stat-number">60%</p>
        </div>
        <!-- Add more stats boxes as needed -->
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

    <div class="chart-container" style="margin-top: 20px; margin-left: 20px;">
        <canvas id="registeredUsersChart" style="width: 100%; height: 100%;"></canvas>
    </div>

    <div class="chart-container" style="margin-top: 20px; margin-left: 20px;">
        <canvas id="jobDistributionChart" style="width: 100%; height: 100%;"></canvas>
    </div>

    <div class="chart-container" style="margin-top: 20px; margin-left: 20px;">
        <canvas id="thirdChart" style="width: 100%; height: 100%;"></canvas>
    </div>

    <div class="chart-container" style="margin-top: 20px; margin-left: 20px;">
        <canvas id="fourthChart" style="width: 100%; height: 100%;"></canvas>
    </div>
</section>

<!-- POPUP -->
<div class="popup-report">
    <!-- Popup content here -->
</div>

<style>
    .chart-container {
        width: 45%;
        height: 400px;
        float: left;
        margin-top: 20px;
        margin-right: 20px;
    }

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

        var thirdChartData = {
            labels: ['A', 'B', 'C', 'D', 'E'],
            datasets: [{
                label: 'Dataset 1',
                data: [10, 20, 30, 40, 50],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var fourthChartData = {
            labels: ['X', 'Y', 'Z'],
            datasets: [{
                label: 'Dataset 1',
                data: [15, 25, 30],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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