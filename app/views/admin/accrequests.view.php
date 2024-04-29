<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/request.css">
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
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- content -->
<section id="main" class="main" style="margin-top: 15px">
    <h2 style="background: white; font-family: 'Arial', sans-serif; margin-top: 6px">Accepted Requests</h2>
    <div class="form">
        <input id="searchInput" style="width: 16%" class="form-group" type="text" placeholder="Search Request ID or Title">
        <i class='bx bx-search icon'></i>

        <input id="searchInput2" style="width: 13%;" class="form-group" type="text" placeholder="Search Type">
        <i class='bx bx-search icon'></i>

        <input id="searchInput3" style="width: 13%;" class="form-group" type="text" placeholder="Search Pay Status">
        <i class='bx bx-search icon'></i>

        <input id="searchInput4" style="width: 16%;" class="form-group" type="text" placeholder="Search Employer Review Status">
        <i class='bx bx-search icon'></i>

        <input id="searchInput5" style="width: 16%;" class="form-group" type="text" placeholder="Search Worker Review Status">
        <i class='bx bx-search icon'></i>
    </div>
    <div class="table-container">
        <table id="dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Job ID</th>
                <th>Employer ID</th>
                <th>Worker ID</th>
                <th>Employer</th>
                <th>Worker</th>
                <th>Title</th>
                <th>Budget</th>
                <th>Payment</th>
                <th>Type</th>
                <th>Payment Status</th>
                <th>Pay Date</th>
                <th>Review Status</th>
                <th>Worker Review Status</th>

                <th>Accepted</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request->id ?></td>
                    <td><?= $request->job_id ?></td>
                    <td><?= $request->emp_id ?></td>
                    <td><?= $request->worker_id ?></td>
                    <td><a href="<?=ROOT?>/admin/employeracc&id=<?= $request->emp_id ?>"><?= $request->emp_name ?></a></td>
                    <td><a href="<?=ROOT?>/admin/workerprof&id=<?= $request->worker_id ?>"><?= $request->worker_name ?></a></td>
                    <td><?= $request->title ?></td>
                    <td><?= $request->budget?></td>
                    <td><?= $request->budget*.1 ?></td>
                    <td class="type-<?php echo ($request->type == "worker") ? "worker" : "employer"?>"><?= $request->type ?></td>
                    <td class="status-<?php echo ($request->payment_stat == "Pay Now") ? "unpaid" : "paid"?>"><?= ($request->payment_stat == "Pay Now") ? "Not Paid" : "Done" ?></td>
                    <td><?= date($request->pay_date) ?></td>
                    <td style=""><div class="review-<?php echo ($request->review_status == "Mark As Completed") ? "markas" : ( ($request->review_status == "Rated") ? "rated": "completed")?>"><?= ($request->review_status == "Mark As Completed") ? "Not Marked as Complete" : ( ($request->review_status == "Rated") ? "Rated": "Complete") ?></div></td>
                    <td ><div class="review-<?php echo ($request->worker_review == "Not_Rated") ? "markas" : ( ($request->review_status == "Job_Completed") ? "rated": "completed")?>"><?= ($request->worker_review == "Not_Rated") ? "Not Rated" : ( ($request->review_status == "Job_Completed") ? "Job Complete": "Rated") ?></div></td>

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
        <button type="submit" class="yes-button" name = "delete">Yes</button>
        <button  type="button" class="no-button" onclick="hideConfirmationPopup()">No</button>
    </form>
</div>




<script>
    const searchInput = document.getElementById('searchInput');
    const searchInput2 = document.getElementById('searchInput2');
    const searchInput3 = document.getElementById('searchInput3');
    const searchInput4 = document.getElementById('searchInput4');
    const searchInput5 = document.getElementById('searchInput5');
    const dataTable = document.getElementById('dataTable');
    const rows = dataTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
        const searchString = searchInput.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const id = row.cells[0].innerText.toLowerCase();
            const title = row.cells[6].innerText.toLowerCase();

            if (id.indexOf(searchString) > -1 || title.indexOf(searchString) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    searchInput2.addEventListener('input', function() {
        const searchString = searchInput2.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const type = row.cells[8].innerText.toLowerCase();

            if (type.indexOf(searchString) > -1 ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    searchInput3.addEventListener('input', function() {
        const searchString = searchInput3.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const status = row.cells[10].innerText.toLowerCase();

            if (status.indexOf(searchString) > -1 ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    searchInput4.addEventListener('input', function() {
        const searchString = searchInput4.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const status = row.cells[12].innerText.toLowerCase();

            if (status.indexOf(searchString) > -1 ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    searchInput5.addEventListener('input', function() {
        const searchString = searchInput5.value.toLowerCase().trim();

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const status = row.cells[13].innerText.toLowerCase();

            if (status.indexOf(searchString) > -1 ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
    function showConfirmationPopup(id) {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'block';
        const form = document.getElementById('deleteForm');
        form.action = `<?= ROOT ?>/admin/accrequests?id=${id}`;
    }

    function hideConfirmationPopup() {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'none';
    }


</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
