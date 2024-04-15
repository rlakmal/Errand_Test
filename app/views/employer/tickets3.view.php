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
        /* Add your additional styles here */
        .main {
            z-index: initial;
        }

        .archived-button {
            background-color: orange;
            color: white;
            padding: 10px;
            border: none;
            cursor: not-allowed;
        }

        .unarchived-button {
            background-color: red;
            color: white;
            padding: 10px;
            border: none;
            cursor: not-allowed;
        }

        .archived-icon,
        .unarchived-icon {
            font-size: 18px;
            color: orange;
            /* You can change the color */
        }

        /* Popup Styles */
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
<?php include 'employernav2.php' ?>

<!-- Sidebar -->
<?php include 'empfilter.php' ?>
<!-- Navigation bar -->
<!-- Scripts -->
<!--<script src="--><?php //= ROOT ?><!--/assets/js/script-bar.js"></script>-->

<!-- content  -->
<div   style="width: 83.7%; position: absolute; top: 8%; right: 0; margin-right: 0">

    <h2 style="text-align: center; margin: 15px; ">Tickets You Raised</h2>

    <form>
        <div class="form">
            <input style="margin-bottom: 15px" class="form-group" type="text" placeholder="Search..." id="searchInput">
            <i class='bx bx-search icon'></i>
            <input class="btn" type="button" onclick="openReport()" value="Raise New Ticket">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th class="ordId">Ticket ID</th>
            <th class="stth">Title</th>
            <th class="desc">Description</th>
            <th class="desc">Raised</th>
            <th></th>
            <th>Archived</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (is_array($data)) {
            $i = 1;
            foreach ($data as $item) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->description; ?></td>
                    <td><?php echo $item->created; ?></td>
                    <td <?php if (!$item->archived) echo 'class="edit-icon"'; ?>>
                        <?php if (!$item->archived) { ?>
                            <a onclick="opene('<?php echo $item->title; ?>', '<?php echo $item->description; ?>', '<?php echo $item->id; ?>')">
                                <i class="bx bxs-edit-alt"></i>
                            </a>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($item->archived) { ?>
                            <i class="archived-icon bx bxs-archive"></i>
                            <button class="archived-button" disabled>Archived</button>
                        <?php } else { ?>
                            <i class="unarchived-icon bx bxs-archive"></i>
                            <button class="unarchived-button" disabled>Not Archived</button>
                        <?php } ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<!-- raise new ticket -->
<div class="popup-report">
    <h2>Raise New Ticket</h2>
    <form method="POST">
        <h4>Title : </h4>
        <input name="title" type="text" placeholder="Enter Ticket Title" required>
        <h4>Description : </h4>
        <input name="description" type="text" placeholder="Enter Ticket Description" required>
        <div class="btns">
            <button type="button" class="cancelb" onclick="closeReport()">Cancel</button>
            <button type="submit" value="Submit" class="cancelb" onclick="closeReport()">Submit</button>
        </div>
    </form>
</div>

<!-- update ticket -->
<div class="popup-v" id="edit">
    <h2>Update Ticket</h2>
    <form action="<?= ROOT ?>/employer/tickets" method="POST">
        <h4>Title : </h4>
        <input style="margin-top: 10px" name="title" type="text" placeholder="Enter Ticket Title" required>
        <h4>Body : </h4>
        <input style="margin-top: 10px" name="description" type="text" placeholder="Enter Ticket Body" required>
        <input type="hidden" name="id">
        <div class="btns">
            <button style="border-radius: 20px" type="button" onclick="closee()">Cancel</button>
            <button style="border-radius: 20px" type="submit" value="Update" name="Updater" onclick="closee()">Update</button>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/admin/crewMembers.js"></script>

<script>
    function opene(title, description, id) {
        // Populate title and description input fields in the edit popup
        document.querySelector('#edit input[name="title"]').value = title;
        document.querySelector('#edit input[name="description"]').value = description;
        document.querySelector('#edit input[name="id"]').value = id;

        // Show the edit popup
        document.querySelector('#edit').style.display = 'block';
    }

    function closee() {
        // Hide the edit popup
        document.querySelector('#edit').style.display = 'none';
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('.table tbody tr');

        rows.forEach(row => {
            const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            if (title.includes(searchText)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>


</body>

</html>
