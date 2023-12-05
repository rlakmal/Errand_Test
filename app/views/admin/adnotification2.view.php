<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crew Members</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto; /* Make the body scrollable */
        }

        .main {
            padding: 20px;
            width: calc(100% - 260px); /* Adjust based on your sidebar width */
            overflow-x: scroll;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            margin-bottom: 20px;
        }

        .form-group {
            padding: 10px;
            margin-right: 10px;
        }

        .btn {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
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
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .edit-icon {
            text-align: center;
        }

        .edit-icon i {
            color: #3498db;
            cursor: pointer;
        }

        .is_active {
            background-color: #e74c3c;
            color: #fff;
        }

        .is_deactive {
            background-color: #2ecc71;
            color: #fff;
        }

        .popup-report,
        .popup-view {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .popup-report h2,
        .popup-view h2 {
            margin-bottom: 20px;
            color: #3498db;
        }

        .popup-report input,
        .popup-view input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btns {
            display: flex;
            justify-content: space-between;
        }

        .cancelR-btn,
        .close-btn {
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }
    </style>
</head>

<body>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>

<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- content  -->
<section id="main" class="main">

    <h2>Crew Members Details</h2>

    <form>
        <div class="form">
            <input class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
            <input class="btn" type="button" onclick="openReport()" value="New Announcement">
        </div>
    </form>

    <table>
        <thead>
        <tr>
            <th></th>
            <th class="ordId">ID</th>
            <th class="stth">Title</th>
            <th class="desc">Body</th>
            <th class="desc">Worker</th>
            <th class="desc">Employer</th>
            <th class="desc">Created</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if (is_array($data)) {
            $i = 1;
            foreach ($data as $item) {
                show($item);
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->body; ?></td>
                    <td><?php echo $item->worker; ?></td>
                    <td><?php echo $item->employer; ?></td>
                    <td><?php echo $item->created; ?></td>

                    <td class="edit-icon"><a type="hidden" data-order=<?= json_encode($item); ?> onclick="openView(this)">
                            <i class="bx bxs-edit-alt"></i>
                            <span class="link_name"></span>
                        </a></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                            <button name="active" value="valid" class="is_active">Delete
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

<!-- Add members -->
<div class="popup-report">
    <h2>New Announcement</h2>
    <form method="POST">
        <h4>Title:</h4>
        <input name="title" type="text" placeholder="Enter Title">
        <h4>Body:</h4>
        <input name="body" type="text" placeholder="Enter Body">
        <h4>For Employer:</h4>
        <input name="employer" type="checkbox">
        <h4>For Worker:</h4>
        <input name="worker" type="checkbox">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
            <button type="submit" name="announcement" value="Submit" class="close-btn">Submit</button>
        </div>
    </form>
</div>

<!-- Update members -->
<div class="popup-view">
    <h2>Update Announcement</h2>
    <form method="POST">
        <h4>Title:</h4>
        <input name="title" type="text" placeholder="Enter Title">
        <h4>Body:</h4>
        <input name="body" type="text" placeholder="Enter Body">
        <h4>For Employer:</h4>
        <input name="employer" type="checkbox">
        <h4>For Worker:</h4>
        <input name="worker" type="checkbox">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeView()">Cancel</button>
            <button type="submit" name="announcement" value="Submit" class="close-btn">Submit</button>
        </div>
    </form>
</div>

<div id="overlay" class="overlay"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    // function openReport() {
    //     document.querySelector('.popup-report').style.display = 'flex';
    //     document.querySelector('.overlay').style.display = 'block';
    // }
    //
    // function closeReport() {
    //     document.querySelector('.popup-report').style.display = 'none';
    //     document.querySelector('.overlay').style.display = 'none';
    // }
    //
    // function openView(element) {
    //     document.querySelector('.popup-view').style.display = 'flex';
    //     document.querySelector('.overlay').style.display = 'block';
    // }
    //
    // function closeView() {
    //     document.querySelector('.popup-view').style.display = 'none';
    //     document.querySelector('.overlay').style.display = 'none';
    // }
</script>
</body>

</html>
