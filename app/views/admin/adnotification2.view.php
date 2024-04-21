<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef;
            color: #333;
        }

        .main {
            margin: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #555;
            font-weight: bold;
            text-transform: uppercase;
        }

        .form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
            margin-right: 10px;
            color: #666;
        }

        .icon {
            font-size: 20px;
            color: #666;
            margin-left: -40px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            color: #555;
        }

        .table th {
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .edit-icon {
            text-align: center;
        }

        .edit-btn {
            color: #3498db;
            cursor: pointer;
        }

        .edit-btn:hover {
            color: #2980b9;
        }

        /* Added styles for filter buttons */
        .filter-btns {
            margin-bottom: 20px;
        }

        .filter-btn {
            padding: 8px 16px;
            border: none;
            background-color: #ccc;
            color: #333;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin-right: 10px;
        }

        .filter-btn.active {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>

<!-- content  -->
<section id="main" class="main">
    <h2>Announcements</h2>

    <!-- Filter Buttons -->
    <div class="filter-btns">
        <button class="filter-btn" id="workerBtn">Worker</button>
        <button class="filter-btn" id="employerBtn">Employer</button>
    </div>

    <form>
        <div class="form">
            <input class="form-group" type="text" id="searchInput" placeholder="Search...">
            <i class='bx bx-search icon'></i>
            <input class="btn" type="button" onclick="openReport()" value="New Announcement">
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th class="ordId">ID</th>
            <th class="desc">Title</th>
            <th class="desc">Body</th>
            <th class="desc">Worker</th>
            <th class="desc">Employer</th>
            <th class="desc">Created</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="tableBody">
        <?php
        if (is_array($data)) {
            $i = 1;
            foreach ($data as $item) {
                ?>
                <tr data-worker="<?php echo $item->worker; ?>" data-employer="<?php echo $item->employer; ?>">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->body; ?></td>
                    <td><?php echo $item->worker; ?></td>
                    <td><?php echo $item->employer; ?></td>
                    <td><?php echo $item->created;  unset($item->created); ?></td>
                    <td class="edit-icon">
                        <a href="#" class="edit-btn" data-order="<?= htmlspecialchars(json_encode($item)); ?>">
                            <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
                        </a>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                            <button name="active" value="valid" class="is_active">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</section>

<!-- add members -->
<div class="popup-report">
    <h2>Post Announcement</h2>
    <h4>Title: </h4>
    <form method="POST" action="<?= ROOT ?>/admin/adnotification2">
        <input name="title" type="text" placeholder="Enter Title">
        <h4>Body: </h4>
        <input name="body" type="text" placeholder="Enter Body">
        <h4>Worker: </h4>
        <input name="worker" type="checkbox">
        <h4>Employer: </h4>
        <input name="employer" type="checkbox">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
            <button type="submit" name="announcement" value="Submit" class="close-btn" onclick="closeReport()">Post</button>
        </div>
    </form>
</div>

<!-- update members -->
<div class="popup-view">
    <h2>Update Announcement</h2>
    <form method="POST">
        <h4>Title: </h4>
        <input name="title" type="text" placeholder="Enter Title">
        <h4>Body: </h4>
        <input name="body" type="text" placeholder="Enter Body">
        <h4>Worker: </h4>
        <input name="worker" type="checkbox">
        <h4>Employer: </h4>
        <input name="employer" type="checkbox">
        <input type="hidden" name="id">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeView()">Cancel</button>
            <button type="submit" name="update" value="Update" class="close-btn" onclick="closeView()">Update</button>
        </div>
    </form>
</div>

<div id="overlay" class="overlay"></div>

<script>
    let overlay = document.getElementById("overlay");
    let popupReport = document.querySelector(".popup-report");
    let popupView = document.querySelector(".popup-view");
    let editButtons = document.querySelectorAll('.edit-btn');
    let tableBody = document.getElementById('tableBody');
    let workerBtn = document.getElementById('workerBtn');
    let employerBtn = document.getElementById('employerBtn');

    // Filter buttons functionality
    workerBtn.addEventListener('click', function() {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
            filterItems('worker', false);
        } else {
            toggleFilter(this);
            filterItems('worker', true);
        }
    });

    employerBtn.addEventListener('click', function() {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
            filterItems('employer', false);
        } else {
            toggleFilter(this);
            filterItems('employer', true);
        }
    });

    function toggleFilter(btn) {
        // Remove 'active' class from all buttons
        document.querySelectorAll('.filter-btn').forEach(function(button) {
            button.classList.remove('active');
        });
        // Add 'active' class to the clicked button
        btn.classList.add('active');
    }

    function filterItems(filterType, isActive) {
        Array.from(tableBody.children).forEach(function(row) {
            let dataAttr = row.getAttribute('data-' + filterType);
            if (isActive) {
                if (dataAttr === "1") {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            } else {
                row.style.display = '';
            }
        });
    }

    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const itemData = JSON.parse(this.getAttribute('data-order'));
            openView(itemData);
        });
    });

    function openView(itemData) {
        dataBindtoForm(itemData);
        popupView.classList.add("open-popup-view");
        overlay.classList.add("overlay-active");
    }

    function closeView() {
        popupView.classList.remove("open-popup-view");
        overlay.classList.remove("overlay-active");
    }

    function openReport() {
        popupReport.classList.add("open-popup-report");
        overlay.classList.add("overlay-active");
    }

    function closeReport() {
        popupReport.classList.remove("open-popup-report");
        overlay.classList.remove("overlay-active");
    }

    // edit form for bind that data
    function dataBindtoForm(data) {
        document.querySelector('.popup-view input[name="id"]').value = data.id;
        document.querySelector('.popup-view input[name="title"]').value = data.title;
        document.querySelector('.popup-view input[name="body"]').value = data.body;
        document.querySelector('.popup-view input[name="worker"]').checked = data.worker;
        document.querySelector('.popup-view input[name="employer"]').checked = data.employer;
    }

    // Search functionality
    let searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function() {
        let searchText = searchInput.value.toLowerCase();
        Array.from(tableBody.children).forEach(function(row) {
            let id = row.children[1].textContent.trim().toLowerCase();
            let title = row.children[2].textContent.trim().toLowerCase();
            if (id.includes(searchText) || title.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>

</html>
