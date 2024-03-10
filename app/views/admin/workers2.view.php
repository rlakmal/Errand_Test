<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registered Workers</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto; /* Make the body scrollable */
        }

        .main {
            padding: 20px;
            width: calc(100% - 260px); /* Adjust based on your sidebar width */
            overflow-x: scroll;
        }


        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            z-index: -9999;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #3498db;
            color: #fff;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #e5e5e5;
        }

        .edit-view-profile a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-view-profile a:hover {
            color: #2980b9;
        }

        .verified-widget {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .verified-icon {
            color: #2ecc71;
            font-size: 16px;
        }

        .not-verified-icon {
            color: #e74c3c;
            font-size: 16px;
        }

        @media screen and (max-width: 768px) {
            .form {
                flex-direction: column;
            }

            .form-group {
                width: 100%;
                margin-bottom: 10px;
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

<!-- content  -->
<section id="main" class="main">
    <h2>Registered Workers</h2>
    <form>
        <div class="form">
            <!-- Category Selector -->
            <select class="form-group" name="category">
                <!-- Add more categories as needed -->
            </select>
            <!-- Location Selector -->
            <select class="form-group" name="location">
                <!-- Add more locations as needed -->
            </select>
            <input class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th class="ordId">WORKER NAME</th>
            <th class="desc">CATEGORY</th>
            <th class="stth">WORKER ID</th>
            <th class="cost">USERNAME</th>
            <th class="verified">VERIFIED</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $index = 1; ?>
        <?php foreach ($data as $worker) : ?>
            <tr>
                <td><?= $index ?></td>
                <td><a href="#" class="worker-link"><?= $worker->name ?></a></td>
                <td><?= $worker->category ?></td>
                <td><?= $worker->id ?></td>
                <td><?= $worker->email ?></td>
                <td class="verified-widget">
                    <?php if ($worker->verified) : ?>
                        <i class="bx bx-check-circle verified-icon"></i>
                        <span>Verified</span>
                    <?php else : ?>
                        <i class="bx bx-x-circle not-verified-icon"></i>
                        <span>Not Verified</span>
                    <?php endif; ?>
                </td>
                <td class="edit-view-profile">
                    <a href="<?= ROOT ?>/admin/workerprof&id=<?= $worker->id ?>">
                        <i class="fas fa-user icon"></i>
                    </a>
                </td>
            </tr>
            <?php $index++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/1/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
