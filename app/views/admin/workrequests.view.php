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
        .table-container {
            max-height: 80vh; /* Set the maximum height for the container (80% of the viewport height) */
            overflow-y: scroll;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status-requested {
            color: #007bff;
        }

        .status-accepted {
            color: #28a745;
        }

        .status-canceled {
            color: #dc3545;
        }

        .status-rejected {
            color: #ffc107;
        }

        .status-expired {
            color: #6c757d;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 8px;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 20px;
            z-index: 9999;
            display: none;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
            animation: fadeIn 0.5s ease forwards;
        }

        .popup button {
            margin-top: 20px;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .popup button.yes-button {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .popup button.no-button {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .popup img {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>

<!-- content -->
<section id="main" class="main">
    <h2>Worker Requests</h2>
    <div class="form">
        <input id="searchInput" style="width: 13%" class="form-group" type="text" placeholder="Search...">
        <i class='bx bx-search icon'></i>
    </div>
    <div class="table-container">
        <table>
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
    document.addEventListener("DOMContentLoaded", function () {
        // Get the search input element
        var searchInput = document.getElementById("searchInput");

        // Add event listener for input change
        searchInput.addEventListener("input", function () {
            var filter = searchInput.value.toUpperCase();
            var tableRows = document.querySelectorAll("table tbody tr");

            // Loop through all table rows and hide those that don't match the search query
            tableRows.forEach(function (row) {
                var idColumn = row.cells[0].textContent.toUpperCase();
                var titleColumn = row.cells[5].textContent.toUpperCase();

                // Show the row if the search query matches the ID or the title
                if (idColumn.indexOf(filter) > -1 || titleColumn.indexOf(filter) > -1) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
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
