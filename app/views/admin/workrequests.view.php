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
    <h2 style="background: white; font-family: 'Arial', sans-serif; margin-top: 6px">Worker Requests</h2>
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
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($requests)){
                foreach ($requests as $request): ?>
                    <tr class="data">
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
                            <a onclick="opene('<?php echo $request->title; ?>', '<?php echo $request->description; ?>','<?php echo $request->newbudget; ?>','<?php echo $request->budget; ?>', '<?php echo $request->id; ?>')">
                                <i style="font-size: 25px" class="bx bxs-edit"></i>
                            </a>
                        </td>
                        <td>
                            <button class="delete-button" onclick="showConfirmationPopup(<?= $request->id ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach;
            } ?>
            </tbody>
        </table>
    </div>
</section>

<div class="popup" id="deleteConfirmationPopup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Close" >
    <p>Are you sure you want to delete this item?</p>
    <form id="deleteForm" method="post">
        <button type="submit" name = "delete" class="yes-button">Yes</button>
        <button type="button" class="no-button" onclick="hideConfirmationPopup()">No</button>
    </form>
</div>

<div class="popup-v" id="edit">
    <h2>Update Budget</h2>
    <form action="<?= ROOT ?>/admin/workrequests" method="POST">
        <h4>Title : </h4>
        <input style="margin-top: 10px" name="title" type="text" placeholder="Enter Ticket Title" disabled>
        <h4>Description : </h4>
        <input style="margin-top: 10px" name="description" type="text" placeholder="Enter Ticket Body" disabled>
        <h4>Budget : </h4>
        <input style="margin-top: 10px" name="budget" type="text" placeholder="budget" disabled>
        <h4>New Budget : </h4>
        <input style="margin-top: 10px" name="newbudget" type="text" placeholder="budget" >
        <input type="hidden" name="id">
        <div class="btns">
            <button style="border-radius: 20px" type="button" onclick="closee()">Cancel</button>
            <button style="border-radius: 20px" type="submit" value="Update" name="update" onclick="closee()">Update</button>
        </div>
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
    const rows = dataTable.querySelectorAll('.data');



    function matchFilters(row) {

        const searchString = searchInput.value.toLowerCase().trim();
        const searchString2 = searchInput2.value.toLowerCase().trim();
        const searchString3 = searchInput3.value.toLowerCase().trim();


        const id = row.cells[0].innerText.toLowerCase();
        const title = row.cells[5].innerText.toLowerCase();
        const city = row.cells[8].innerText.toLowerCase();
        const worker_id = row.cells[2].innerText.toLowerCase();
        const name = row.cells[4].innerText.toLowerCase();


        const match = (searchString === "" || id.includes(searchString) || title.includes(searchString)) &&
            (searchString2 === "" || city.includes(searchString2)) &&
            (searchString3 === "" || worker_id.includes(searchString3) || name.includes(searchString3))



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
    searchInput.addEventListener('input', filterRows);
    searchInput2.addEventListener('input', filterRows);
    searchInput3.addEventListener('input', filterRows);


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

    function opene(title, description,newbudget, budget, id) {
        // Populate title and description input fields in the edit popup
        document.querySelector('#edit input[name="title"]').value = title;
        document.querySelector('#edit input[name="description"]').value = description;
        document.querySelector('#edit input[name="budget"]').value = budget;
        document.querySelector('#edit input[name="newbudget"]').value = newbudget;
        document.querySelector('#edit input[name="id"]').value = id;

        // Show the edit popup
        document.querySelector('#edit').style.display = 'block';
    }

    function closee() {
        // Hide the edit popup
        document.querySelector('#edit').style.display = 'none';
    }
</script>

<!-- Your additional scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
