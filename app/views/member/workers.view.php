<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registered Workers</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/chat.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
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
            background: #f4f4f4;
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
            background-color: #f4f4f4;
            color: black;
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
    <h2 style="background: #f4f4f4; font-family: 'Arial', sans-serif">Registered Workers</h2>
    <form style="background: #f4f4f4">
        <div class="form">
            <!-- Category Selector -->
            <select class="form-group" name="category" id = "searchInput">
                <option value="All">All</option>
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
                <option value="Garden">Garden</option>
                <option value="Painting">Painting</option>
                <option value="Roofing">Roofing</option>
                <!-- Add more categories as needed -->
            </select>
            <!-- Search bar -->
            <input id="searchInput2" class="form-group" type="text" placeholder="Search Location...">
            <input id="searchInput3" class="form-group" type="text" placeholder="Search Worker ID">
            <input style="margin-right: 10%" id="searchInput4" class="form-group" type="text" placeholder="Search by Name or ID">
        </div>
    </form>
    <div style="overflow-y: scroll; height: 700px">

        <table class="table" >
            <thead>
            <tr>
                <th class="ordId"></th>
                <th class="ordId">ID</th>
                <th class="ordId">Worker ID</th>
                <th class="ordId"></th>
                <th class="ordId">Worker Name</th>
                <th class="desc">Category</th>
                <th class="stth">Username</th>
                <th class="stth">Location</th>
                <th class="cost">Verified</th>
                <!--                <th class="cost">message</th>-->
                <th class="verified">Profile</th>
            </tr>
            </thead>

            <tbody >
            <?php $index = 0;
            foreach ($data as $worker) : $index = $index + 1?>
                <tr class="datax">
                    <td><?= $index ?></td>
                    <td><?= $worker->emp_id ?></td>
                    <td><?= $worker->work_id ?></td>
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
                    <td class="edit-view-profile"><a href="<?= ROOT ?>/member/verification2&id=<?= $worker->work_id ?>">
                            <span class="link_name"><i class="fas fa-user icon"></i></span>
                        </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>




<!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>




<script>


    const searchInput = document.getElementById('searchInput');
    const searchInput2 = document.getElementById('searchInput2');
    const searchInput3 = document.getElementById('searchInput3');
    const searchInput4 = document.getElementById('searchInput4');
    const rows = document.querySelectorAll('.datax');

    // Function to check if a row matches all filter criteria
    // Function to check if a row matches all filter criteria
    function matchFilters(row) {

        const searchString = searchInput.value.toLowerCase().trim();
        const searchString2 = searchInput2.value.toLowerCase().trim();
        const searchString3 = searchInput3.value.toLowerCase().trim();
        const searchString4 = searchInput4.value.toLowerCase().trim();


        const category = row.cells[5].innerText.toLowerCase();
        const city = row.cells[7].innerText.toLowerCase();
        const worker_id = row.cells[2].innerText.toLowerCase();
        const id = row.cells[1].innerText.toLowerCase();
        const name = row.cells[4].innerText.toLowerCase();


        const match = (searchString4 === "" || id.includes(searchString4) || name.includes(searchString4)) &&
            (searchString2 === "" || city.includes(searchString2)) &&
            (searchString3 === "" || worker_id.includes(searchString3)) &&
            (searchString === "all" || category.includes(searchString))

        console.log("Match:", match);

        return match;
    }


    // Function to filter rows based on all filter criteria
    function filterRows() {
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            if (matchFilters(row)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    // Add event listeners to all filter inputs
    searchInput.addEventListener('change', filterRows);
    searchInput2.addEventListener('input', filterRows);
    searchInput3.addEventListener('input', filterRows);
    searchInput4.addEventListener('input', filterRows);
</script>


</body>

</html>
