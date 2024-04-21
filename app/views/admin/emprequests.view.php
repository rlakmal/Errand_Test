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

        .popup-v {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            z-index: 9999;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
            max-width: 90%;
            animation: popup-show 0.5s ease forwards;
            border: 3px solid red; /* Add red border */
            width: 30%;
        }

        @keyframes popup-show {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .popup-v h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .popup-v form {
            text-align: left;
        }

        .popup-v label {
            display: block;
            margin-bottom: 10px;
        }

        .popup-v input[type="text"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 16px;
            background-color: lightgray;
        }

        .popup-v .btns {
            display: flex;
            justify-content: center;
            border-radius: 20px;
        }

        .popup-v .btns button {
            padding: 12px 24px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-v .btns .cancelb {
            background-color: #ccc;
            color: #fff;
        }

        .popup-v .btns button[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }

        /* Animation for hiding the popup */
        @keyframes popup-hide {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
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

<!-- content -->
<section id="main" class="main">
    <h2>Employer Requests</h2>
    <div class="form">
        <input id="searchInput" style="width: 13%" class="form-group" type="text" placeholder="Search...">
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
                <th>Budget</th>
                <th>City</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
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
                    <td><?= $request->budget ?></td>
                    <td><?= $request->city ?></td>
                    <td><?= $request->description ?></td>
                    <td class="status-<?= strtolower($request->status) ?>"><?= $request->status ?></td>
                    <td><?= $request->created ?></td>
                    <td>
                        <a onclick="opene('<?php echo $request->title; ?>', '<?php echo $request->description; ?>','<?php echo $request->budget; ?>', '<?php echo $request->id; ?>')">
                            <i class="bx bxs-edit"></i>
                        </a>
                    </td>
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
        <button type="submit" class="yes-button" name="delete">Yes</button>
        <button type="button" class="no-button" onclick="hideConfirmationPopup()">No</button>
    </form>
</div>


<div class="popup-v" id="edit">
    <h2>Update Ticket</h2>
    <form action="<?= ROOT ?>/admin/emprequests" method="POST">
        <h4>Title : </h4>
        <input style="margin-top: 10px" name="title" type="text" placeholder="Enter Ticket Title" required>
        <h4>Description : </h4>
        <input style="margin-top: 10px" name="description" type="text" placeholder="Enter Ticket Body" required>
        <h4>Budget : </h4>
        <input style="margin-top: 10px" name="budget" type="text" placeholder="budget" required>
        <input type="hidden" name="id">
        <div class="btns">
            <button style="border-radius: 20px" type="button" onclick="closee()">Cancel</button>
            <button style="border-radius: 20px" type="submit" value="Update" name="update" onclick="closee()">Update</button>
        </div>
    </form>
</div>


<script>
    const searchInput = document.getElementById('searchInput');
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

    function showConfirmationPopup(id) {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'block';
        // Set the action URL for the form
        const form = document.getElementById('deleteForm');
        form.action = `<?= ROOT ?>/admin/emprequests?id=${id}`;
    }

    function hideConfirmationPopup() {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'none';
    }


    function opene(title, description, budget, id) {
        // Populate title and description input fields in the edit popup
        document.querySelector('#edit input[name="title"]').value = title;
        document.querySelector('#edit input[name="description"]').value = description;
        document.querySelector('#edit input[name="budget"]').value = budget;
        document.querySelector('#edit input[name="id"]').value = id;

        // Show the edit popup
        document.querySelector('#edit').style.display = 'block';
    }

    function closee() {
        // Hide the edit popup
        document.querySelector('#edit').style.display = 'none';
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
