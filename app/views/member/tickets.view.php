<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tickets</title>
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

        .report-widgets {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .report-widget {
            width: 100%; /* Set the width to 100% for a vertical list */
            max-width: 300px; /* Set the maximum width of each widget */
            background-color: #3498db;
            margin: 20px;
            padding: 20px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; /* Add transition for transform property */
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none; /* Remove underline from the entire widget */
        }

        .report-widget:hover {
            background-color: #2980b9;
            transform: scale(1.1); /* Enlarge the widget on hover */
        }

        .report-widget a {
            color: #fff;
            text-decoration: none; /* Remove underline from the title */
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .widget-content {
            font-size: 16px;
            margin-top: 10px; /* Add spacing between title and content */
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

<!-- content  -->
<section id="main" class="main">
    <h2>Reports</h2>

    <div class="report-widgets">
        <a href="#" class="report-widget">
            <div>
                <p>Title 1</p>
                <div class="widget-content">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>User Type: Admin</p>
                    <p>Archived: No</p>
                    <p>Raised Datetime: October 25, 2023</p>
                </div>
            </div>
        </a>

        <!-- Include other report widgets as needed -->

        <a href="#" class="report-widget">
            <div>
                <p>Title 2</p>
                <div class="widget-content">
                    <p>Description: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>User Type: Moderator</p>
                    <p>Archived: Yes</p>
                    <p>Raised Datetime: October 26, 2023</p>
                </div>
            </div>
        </a>

        <a href="#" class="report-widget">
            <div>
                <p>Title 3</p>
                <div class="widget-content">
                    <p>Description: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p>User Type: User</p>
                    <p>Archived: No</p>
                    <p>Raised Datetime: October 27, 2023</p>
                </div>
            </div>
        </a>

        <a href="#" class="report-widget">
            <div>
                <p>Title 4</p>
                <div class="widget-content">
                    <p>Description: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                    <p>User Type: Admin</p>
                    <p>Archived: Yes</p>
                    <p>Raised Datetime: October 28, 2023</p>
                </div>
            </div>
        </a>

        <a href="#" class="report-widget">
            <div>
                <p>Title 5</p>
                <div class="widget-content">
                    <p>Description: Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                    <p>User Type: Moderator</p>
                    <p>Archived: No</p>
                    <p>Raised Datetime: October 29, 2023</p>
                </div>
            </div>
        </a>
    </div>
</section>
</body>

</html>
