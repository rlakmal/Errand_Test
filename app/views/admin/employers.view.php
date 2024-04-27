<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/employers.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Custom Styles */

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
    <h2>Registered Employers</h2>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector(".form-group");
        const tableRows = document.querySelectorAll(".table tbody tr");

        searchInput.addEventListener("input", function (event) {
            const searchText = event.target.value.trim().toLowerCase();

            tableRows.forEach(function (row) {
                const employerName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                const employerId = row.querySelector("td:nth-child(3)").textContent;

                if (!isNaN(searchText)) {
                    if (employerId.includes(searchText)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                } else {
                    if (employerName.includes(searchText)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
