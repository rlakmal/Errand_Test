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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .popup-v h2 {
            margin-top: 0;
        }

        .popup-v input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .popup-v .btns {
            display: flex;
            justify-content: space-between;
        }

        .popup-v .btns button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /*.popup-v .btns .cancelR-btn {*/
        /*    background-color: #ccc;*/
        /*    color: #fff;*/
        /*}*/

        .popup-v .btns .close-btn {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
<?php include 'employernav2.php' ?>

<!-- Sidebar -->
<?php include 'empfilter.php' ?>
<!-- Navigation bar -->
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- content  -->
<section id="main" class="main">

    <h2>Tickets You Raised</h2>

    <form>
        <div class="form">
            <input class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
            <input class="btn" type="button" onclick="openReport()" value="Raise New Ticket">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        </div>
    </form>

    <table class="table" >
        <thead>
        <tr>
            <th></th>
            <th class="ordId">Ticket ID</th>
            <th class="stth">Title</th>
            <th class="desc">Description</th>
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
</section>

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
<div class="popup-v">
    <h2>Update Ticket</h2>
    <form action="<?= ROOT ?>/employer/tickets" method="POST">
        <h4>Title : </h4>
        <input name="title" type="text" placeholder="Enter Ticket Title" required>
        <h4>Body : </h4>
        <input name="description" type="text" placeholder="Enter Ticket Body" required>
        <input type="hidden" name="id">
        <div class="btns">
            <button type="button" class="cancelb" onclick="closee()">Cancel</button>
            <button type="submit" value="Update" name="Updater" class="close-btn" onclick="closee()">Update</button>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/admin/crewMembers.js"></script>

<script>
    function opene(title, description, id) {
        // Populate title and description input fields in the popup
        document.querySelector('.popup-v input[name="title"]').value = title;
        document.querySelector('.popup-v input[name="description"]').value = description;
        document.querySelector('.popup-v input[name="id"]').value = id;

        // Show the popup
        document.querySelector('.popup-v').style.display = 'block';
    }

    function closee() {
        // Reset input fields in the popup
        // document.querySelector('.popup-v input[name="title"]').value = '';
        // document.querySelector('.popup-v input[name="description"]').value = '';
        // document.querySelector('.popup-v input[name="id"]').value = '';


        // Hide the popup
        document.querySelector('.popup-v').style.display = 'none';
        console.log("asshole")
    }
</script>

</body>

</html>
