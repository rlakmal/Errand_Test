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

<!-- content  -->
<!-- Ruwanga Section -->
<!-- <section id="main" class="main">
    <h2>Data</h2>
    <form>
        <div class="form">
            <input class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
            <input class="new-btn" type="button" onclick="openNew()" value="+ New ">
            <input class="btn" type="button" onclick="openReport()" value="Report Problem">
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th class="ordId">Total Workers</th>
            <th class="desc">Categories</th>
            <th class="stth">Current Week</th>
            <th class="cost">Profit</th>
            <th></th>
        </tr>
        </thead>
    </table>
    <div id="overlay" class="overlay"></div>

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
</section> -->

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
                <span class="material-symbols-sharp">analytics</span>
            </div>
            <h1>80</h1>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-- END OF SALES -->
        
        <div class="completed-jobs">     
            <div class="middle">
                <h1>Completed Jobs</h1>
                <span class="material-symbols-sharp">bar_chart</span> 
            </div>
            <h1>54</h1>
            <small class="text-muted">Last 24 hours</small>
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

<!-- POPUP -->
<!-- Ruwanga Edition -->
<!-- <div class="popup-report">
    <h2>Report Your Problem</h2>
    <h4>Your name : </h4>
    <input type="text" placeholder="Enter your name">
    <h4>Your email : </h4>
    <input type="text" placeholder="Enter your email">
    <h4>Problem : </h4>
    <textarea name="problem" id="problem" cols="30" rows="10" placeholder="Enter your problem"></textarea>
    <div class="btns">
        <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
        <button type="button" class="close-btn" onclick="closeReport()">Submit</button>
    </div>
</div>

<div class="popup-view" id="popup-view">
    <button type="button" class="update-btn pb">Update Order</button>
    <button type="button" class="cancel-btn pb">Cancel Order</button>
    <h2>Order Details</h2>
    <div class="status">
        <ul>
            <li>
                <iconify-icon icon="streamline:interface-time-stop-watch-alternate-timer-countdown-clock"></iconify-icon>
                <div class="progress one">
                    <i class="uil uil-check"></i>
                </div>
                <p class="text">Pending</p>
            </li>
            // Include other status items as needed
        </ul>
    </div>
    <div class="container1">
        <form>
            // Include other input fields as needed
            <div class="input-box">
                <span class="details">Order Id </span>
                <input type="text" id="" />
            </div>
            // Include other input boxes as needed
        </form>
    </div>
    <button type="button" class="ok-btn" onclick="closeView()">OK</button>
</div>


<style>
    .chart-container {
        width: 45%;
        height: 400px;
        float: left;
        margin-top: 20px;
        margin-right: 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sample data for charts
        var registeredUsersData = {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Registered Users',
                data: [50, 75, 120, 90, 150],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var jobDistributionData = {
            labels: ['Web Development', 'Graphic Design', 'Data Entry', 'Delivery'],
            datasets: [{
                label: 'Job Distribution',
                data: [30, 20, 15, 35],
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
<script src="<?= ROOT ?>/assets/js/admin/script.js"></script>
</body>

</html>