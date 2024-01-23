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

        .form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group {
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .icon {
            font-size: 24px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
                <option value="all">All Categories</option>
                <option value="category1">Technicians</option>
                <option value="category2">AC Repairs</option>
                <option value="CCTV">CCTV</option>
                <option value="Constructions">Constructions</option>
                <option value="Electricians">Electricians</option>
                <option value="Electronic Repairs">Electronic Repairs</option>
                <option value="Glass & Aluminium">Glass & Aluminium</option>
                <option value="Iron Works">Iron Works</option>
                <option value="Masonry">Masonry</option>
                <option value="Odd Jobs">Odd Jobs</option>
                <option value="Pest Controllers">Pest Controllers</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Wood Works">Wood Works</option>
                <!-- Add more categories as needed -->
            </select>
            <!-- Location Selector -->
            <select class="form-group" name="location">
                <option value="all">All Locations</option>
                <option value="location1">Location 1</option>
                <option value="location2">Location 2</option>
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
            <th class="ordId">Worker Name</th>
            <th class="desc">Category</th>
            <th class="stth">email</th>
            <th class="cost">Username</th>
            <th class="verified">Verified</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $worker) : ?>
            <tr>
<!--                <td>--><?php //= $index + 1 ?><!--</td>-->
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
                <td class="edit-view-profile"><a href="<?=ROOT?>/member/verification2&id=<?=$worker->id?>">
                        <span class="link_name"><i class="fas fa-user icon"></i></span>
                    </a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
