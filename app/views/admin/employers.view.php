<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            font-family: "Arial", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #main {
            padding: 20px;
        }

        h2 {
            color: #2c3e50; /* Dark blue */
            font-size: 28px; /* Larger font size */
            margin-bottom: 20px;
            font-family: "Arial", sans-serif; /* Change font family */
            text-transform: uppercase; /* Convert text to uppercase */
            letter-spacing: 1px; /* Add letter spacing */
        }


        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow-x: auto; /* Make table horizontally scrollable */
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #ecf0f1; /* Light gray */
            font-size: 16px; /* Font size */
            color: #333; /* Dark gray */
            font-weight: bold;
            font-family: "Arial", sans-serif; /* Change font family */
            text-transform: uppercase; /* Convert text to uppercase */
        }

        .table td {
            font-size: 15px; /* Font size */
            color: #666; /* Medium gray */
        }

        .table tr:hover {
            background-color: #f2f2f2; /* Lighter gray on hover */
        }

        .edit-view-profile a {
            color: #3498db; /* Dark blue */
            text-decoration: none;
            font-weight: bold;
        }

        .edit-view-profile a:hover {
            text-decoration: underline;
        }

        .table-wrapper {
            max-height: 750px; /* Set a max height for the table wrapper */
            overflow-y: auto; /* Make table vertically scrollable */
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h2>REGISTERED EMPLOYERS</h2>
    <form>
        <div class="form">
            <input class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
        </div>
    </form>
    <div class="table-wrapper">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th class="ordId">Employer Name</th>
                <th class="stth">Employer ID</th>
                <th class="cost">Contact</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php $index = 0;
            foreach ($data as $employer) : $index = $index + 1 ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $employer->name ?></td>
                    <td><?= $employer->id ?></td>
                    <td><?= $employer->email ?></td>

                    <td class="edit-view-profile">
                        <a href="<?= ROOT ?>/admin/employeracc&id=<?= $employer->id ?>">
                            <i class="bx bxs-user-detail"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Add more rows with dummy data as needed -->
            </tbody>
        </table>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
