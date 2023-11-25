<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports Page</title>
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
            width: 300px; /* Set the width of each widget */
            height: 200px; /* Set the height of each widget */
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
        }

        .report-widget:hover {
            background-color: #2980b9;
            transform: scale(1.1); /* Enlarge the widget on hover */
        }

        .report-widget a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .widget-content {
            font-size: 16px;
        }

        /* Popup Styles */
        #popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            text-align: left;
            transition: transform 0.3s; /* Add transition for transform property */
        }

        .popup-content h2 {
            margin-bottom: 20px;
        }

        .popup-content button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup-content:hover {
            transform: scale(1.1); /* Enlarge the popup on hover */
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
        <div class="report-widget" onclick="openPopup('Report 1', 'Data: Lorem ipsum dolor sit amet, consectetur adipiscing elit.\nDate: October 25, 2023')">
            <a href="#">Report 1</a>
            <div class="widget-content">
                <p>Data: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Date: October 25, 2023</p>
            </div>
        </div>

        <!-- Include other report widgets as needed -->

        <div class="report-widget" onclick="openPopup('Report 2', 'Data: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\nDate: October 26, 2023')">
            <a href="#">Report 2</a>
            <div class="widget-content">
                <p>Data: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Date: October 26, 2023</p>
            </div>
        </div>

        <div class="report-widget" onclick="openPopup('Report 3', 'Data: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.\nDate: October 27, 2023')">
            <a href="#">Report 3</a>
            <div class="widget-content">
                <p>Data: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                <p>Date: October 27, 2023</p>
            </div>
        </div>

        <div class="report-widget" onclick="openPopup('Report 4', 'Data: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.\nDate: October 28, 2023')">
            <a href="#">Report 4</a>
            <div class="widget-content">
                <p>Data: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                <p>Date: October 28, 2023</p>
            </div>
        </div>

        <div class="report-widget" onclick="openPopup('Report 5', 'Data: Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.\nDate: October 29, 2023')">
            <a href="#">Report 5</a>
            <div class="widget-content">
                <p>Data: Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                <p>Date: October 29, 2023</p>
            </div>
        </div>
    </div>
</section>

<!-- Popup -->
<div id="popup">
    <div class="popup-content">
        <h2 id="popup-title"></h2>
        <p id="popup-data"></p>
        <button onclick="downloadReport()">Download Report</button>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<script>
    function openPopup(title, data) {
        document.getElementById('popup-title').innerHTML = title;
        document.getElementById('popup-data').innerHTML = data;
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    function downloadReport() {
        // Implement download logic here
        alert('Downloading report...');
    }
</script>
</body>

</html>
