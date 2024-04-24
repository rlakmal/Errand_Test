<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard2.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/notification.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>

<!-- content  -->
<section id="main" class="main">
    <h2 style="background: #eef">Announcements</h2>

    <!-- Filter Buttons -->
    <div class="filter-btns">
        <button class="filter-btn" id="workerBtn">Worker</button>
        <button class="filter-btn" id="employerBtn">Employer</button>
    </div>

    <form style="background: #eef">
        <div class="form" style="padding: 15px; background: #eef">
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
            <th class="desc">Posted</th>
<!--            <th></th>-->
<!--            <th></th>-->
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
                        <form style="background: white; align-content: center; align-self: center; align-items: center; padding: 0 0 0 0 " method="POST">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                            <button name="active" value="valid" class="btn2">
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
<div class="popup-view" style="outline-color: #0c5fcd; border-color: #0c5fcd">
    <h2>Update Announcement</h2>
    <form method="POST" style="outline-color: #0c5fcd; border-color: #0c5fcd">
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
