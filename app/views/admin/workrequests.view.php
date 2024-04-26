<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/request3.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">

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

<!-- content -->
<section id="main" class="main" style="margin-top: 15px">
    <h2 style="background: white">Worker Requests</h2>
    <div class="form">
        <input id="searchInput" style="width: 16%" class="form-group" type="text" placeholder="Search by Request ID or Title">
        <i class='bx bx-search icon'></i>

        <input id="searchInput2" style="width: 13%" class="form-group" type="text" placeholder="Search by Location">
        <i class='bx bx-search icon'></i>
        <input id="searchInput3" style="width: 17%" class="form-group" type="text" placeholder="Search by Worker ID or Name">
        <i class='bx bx-search icon'></i>
    </div>
    <div class="table-container">
        <table id="dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employer ID</th>
                <th>Worker ID</th>
                <th>Employer</th>
                <th>Worker</th>
                <th>Title</th>
                <th>New Budget</th>
                <th>Budget</th>
                <th>City</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request->id ?></td>
                    <td><?= $request->emp_id ?></td>
                    <td><?= $request->worker_id ?></td>
                    <td><a href="<?=ROOT?>/admin/employeracc&id=<?= $request->emp_id ?>"><?= $request->emp_name ?></a></td>
                    <td><a href="<?=ROOT?>/admin/workerprof&id=<?= $request->worker_id ?>"><?= $request->worker_name ?></a></td>
                    <td><?= $request->title ?></td>
                    <td><?= $request->newbudget ?></td>
                    <td><?= $request->budget ?></td>
                    <td><?= $request->city ?></td>
                    <td><?= $request->description ?></td>
                    <td class="status-<?= strtolower($request->status) ?>"><?= $request->status ?></td>
                    <td><?= $request->created ?></td>
                    <td>
                        <button class="delete-button" onclick="showConfirmationPopup(<?= $request->id ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<div class="popup" id="deleteConfirmationPopup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Close" >
    <p>Are you sure you want to delete this item?</p>
    <form id="deleteForm" method="post">
        <button type="submit" class="yes-button">Yes</button>
        <button type="button" class="no-button" onclick="hideConfirmationPopup()">No</button>
    </form>
</div>


<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     // Get the search input element
    //     var searchInput = document.getElementById("searchInput");
    //
    //     // Add event listener for input change
    //     searchInput.addEventListener("input", function () {
    //         var filter = searchInput.value.toUpperCase();
    //         var tableRows = document.querySelectorAll("table tbody tr");
    //
    //         // Loop through all table rows and hide those that don't match the search query
    //         tableRows.forEach(function (row) {
    //             var idColumn = row.cells[0].textContent.toUpperCase();
    //             var titleColumn = row.cells[5].textContent.toUpperCase();
    //
    //             // Show the row if the search query matches the ID or the title
    //             if (idColumn.indexOf(filter) > -1 || titleColumn.indexOf(filter) > -1) {
    //                 row.style.display = "";
    //             } else {
    //                 row.style.display = "none";
    //             }
    //         });
    //     });
    // });

    const searchInput = document.getElementById('searchInput');
    const searchInput2 = document.getElementById('searchInput2');
    const searchInput3 = document.getElementById('searchInput3');
    const dataTable = document.getElementById('dataTable');
    const rows = dataTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
        const searchString = searchInput.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const id = row.cells[0].innerText.toLowerCase();
            const title = row.cells[5].innerText.toLowerCase();

            if (id.indexOf(searchString) > -1 || title.indexOf(searchString) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    searchInput2.addEventListener('input', function() {
        const searchString = searchInput2.value.toLowerCase().trim();
        console.log("hoo ah")

        for (let j = 0; j < rows.length; j++) {
            const row1 = rows[j];
            const city = row1.cells[8].innerText.toLowerCase();

            if ( city.indexOf(searchString) > -1) {
                row1.style.display = '';
            } else {
                row1.style.display = 'none';
            }
        }
    });

    searchInput3.addEventListener('input', function() {
        const searchString = searchInput3.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const id = row.cells[2].innerText.toLowerCase();
            const name = row.cells[4].innerText.toLowerCase();

            if (id.indexOf(searchString) > -1 || name.indexOf(searchString) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });


    function showConfirmationPopup(id) {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'block';
        // Set the action URL for the form
        const form = document.getElementById('deleteForm');
        form.action = `<?= ROOT ?>/admin/workrequests?id=${id}`;

        console.log(form.action)
    }

    function hideConfirmationPopup() {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'none';
    }
</script>

<!-- Your additional scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
