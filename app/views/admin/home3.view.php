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

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
<script src="<?= ROOT ?>/assets/js/admin/script.js"></script>
</body>

</html>