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
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            overflow-y: hidden; /* Make the body scrollable */
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
            background: #f4f7fc;
        }

        .form-group {
            padding: 10px;
            margin-right: 10px;
            border-radius: 20px; /* Making borders round */
            border: 1px solid #ccc;
            background-color: #fff; /* Adding background color */
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
            border-right: 1px #ddd;
            padding: 8px;
            text-align: left;
            background: white;
            height: fit-content;
        }

        .table tr{
            height: 70px;

        }
        .table th {
            background-color: #f4f7fc;
            color: black;
            border-radius: 10px; /* Adding curve to table headers */
        }

        .table tr:nth-child(even) {
            background-color: white;
            transition: transform 0.3s;
        }

        .table tr:hover {
            background-color: #e5e5e5;
            transform: scale(1.01);
        }

        .edit-view-profile a {
            text-decoration: none;
            color: #ff904b;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-view-profile a:hover {
            color: darkgoldenrod;
        }

        .verified-widget {
            display: flex;
            align-items: center;
            gap: 5px;
            background: white;
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
    <h2 style="background: #f4f7fc">Registered Workers</h2>
    <form style="background: #f4f7fc">
        <div class="form">
            <!-- Category Selector -->
            <select class="form-group" name="category">
                <option value="all">All Categories</option>
                <option value="Technicians">Technicians</option>
                <option value="AC Repairs">AC Repairs</option>
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
            <!-- Search bar -->
            <input id="searchInput2" class="form-group" type="text" placeholder="Search Location...">
            <input style="margin-right: 10%" id="searchInput" class="form-group" type="text" placeholder="Search by Name or ID">
        </div>
    </form>
    <div style="overflow-y: scroll; height: 700px">

        <table class="table" >
            <thead>
            <tr>
                <th class="ordId">ID</th>
                <th class="ordId"></th>
                <th class="ordId">Worker Name</th>
                <th class="desc">Category</th>
                <th class="stth">Username</th>
                <th class="stth">Location</th>
                <th class="cost">Verified</th>
                <th class="verified">Profile</th>
            </tr>
            </thead>

            <tbody >
            <?php foreach ($data as $worker) : ?>
                <tr>
                    <td><?= $worker->id ?></td>
                    <td>
                        <div style="position: relative">
                            <!--                            --><?php //var_dump($worker)?>
                            <img style="height: 50px; border-radius: 50%; width: 50px" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $worker->profile_image ?>">
                        </div>
                    </td>
                    <td><a href="#" class="worker-link"><?= $worker->name ?></a></td>
                    <td><?= $worker->category ?></td>
                    <td><?= $worker->email ?></td>
                    <td><?= $worker->city ?></td>
                    <td class="verified-widget">
                        <?php if ($worker->verified) : ?>
                            <i class="bx bx-check-circle verified-icon"></i>
                            <span>Verified</span>
                        <?php else : ?>
                            <i class="bx bx-x-circle not-verified-icon"></i>
                            <span>Not Verified</span>
                        <?php endif; ?>
                    </td>
                    <td class="edit-view-profile"><a href="<?= ROOT ?>/member/verification2&id=<?= $worker->id ?>">
                            <span class="link_name"><i class="fas fa-user icon"></i></span>
                        </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get select element
        let categorySelect = document.querySelector('select[name="category"]');
        let tableRows = document.querySelectorAll('.table tbody tr');

        // Add event listener to category select
        categorySelect.addEventListener('change', function() {
            let selectedCategory = categorySelect.value;

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let categoryCell = row.querySelector('td:nth-child(4)').textContent; // Adjusted index for category cell

                // Check if selected category is "All Categories" or matches row's category
                if (selectedCategory === 'all' || categoryCell === selectedCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Get input elements
        let searchInput = document.getElementById('searchInput');
        let searchInput2 = document.getElementById('searchInput2');

        // Add event listener for searchInput
        searchInput.addEventListener('input', function() {
            let searchText = searchInput.value.trim(); // Trimmed whitespace
            let isNumeric = /^\d+$/.test(searchText); // Check if input is numeric

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let id = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // Adjusted index for ID cell
                let name = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Adjusted index for name cell

                // Check if input is numeric
                if (isNumeric) {
                    // Check if search text matches ID
                    if (id.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                } else {
                    // Check if search text matches name
                    if (name.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });

        // Add event listener for searchInput2
        searchInput2.addEventListener('input', function() {
            let searchText2 = searchInput2.value.trim().toLowerCase(); // Trimmed whitespace

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let location = row.querySelector('td:nth-child(6)').textContent.toLowerCase(); // Adjusted index for location cell

                // Check if search text matches location
                if (location.includes(searchText2)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });


</script>
</body>

</html>
