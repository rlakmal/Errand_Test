<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports Page</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> <!-- Bootstrap Icons CDN -->
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
            position: relative; /* Add position relative to contain absolute positioned icon */
            width: 300px; /* Set the width of each widget */
            height: 200px; /* Set the height of each widget */
            background-color: lightgray;
            margin: 20px;
            padding: 20px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s; /* Add transition for transform property */
            border-radius: 10px;
            text-align: left; /* Align text to the left */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start; /* Align items to the left */
            overflow-y: auto;
        }

        .report-widget:hover {
            background-color: gray;
            transform: scale(1.1); /* Enlarge the widget on hover */
        }

        .report-widget a {
            color: #fff;
            text-decoration: none;
            font-size: 20px; /* Increase font size for title */
            font-weight: bold;
            margin-bottom: 10px;
        }

        .widget-content {
            font-size: 16px;
            margin-top: 10px; /* Add margin for content */
        }



        /* Large icon styles */
        .large-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 48px; /* Set the size of the large icon */
            color: #fff; /* Set the color of the large icon */
        }

        /* Popup Styles */
        #popup {
            z-index: 9999;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            overflow-y: auto; /* Make the popup scrollable */
        }

        #popup2 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
        }

        #popup3 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
        }

        .popup-content {
            z-index: 9999;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            max-width: 100%; /* Adjusted to 100% for A4 size */
            width: 21cm; /* A4 width */
            max-height: 80vh; /* Set a maximum height for the popup content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow */
            text-align: left;
            transition: transform 0.3s; /* Add transition for transform property */
            position: relative; /* Set position to relative for logo positioning */
            overflow-y: auto; /* Make the popup content scrollable */
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

        .popup-content2 {
            z-index: 9999;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            max-width: 100%; /* Adjusted to 100% for A4 size */
            width: 21cm; /* A4 width */
            max-height: 80vh; /* Set a maximum height for the popup content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow */
            text-align: left;
            transition: transform 0.3s; /* Add transition for transform property */
            position: relative; /* Set position to relative for logo positioning */
            overflow-y: auto; /* Make the popup content scrollable */
        }

        .popup-content2 h2 {
            margin-bottom: 20px;
        }

        .popup-content2 button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup-content2:hover {
            transform: scale(1.1); /* Enlarge the popup on hover */
        }

        .popup-content3 {
            z-index: 9999;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            max-width: 100%; /* Adjusted to 100% for A4 size */
            width: 21cm; /* A4 width */
            max-height: 80vh; /* Set a maximum height for the popup content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow */
            text-align: left;
            transition: transform 0.3s; /* Add transition for transform property */
            position: relative; /* Set position to relative for logo positioning */
            overflow-y: auto; /* Make the popup content scrollable */
        }

        .popup-content3 h2 {
            margin-bottom: 20px;
        }

        .popup-content3 button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup-content3:hover {
            transform: scale(1.1); /* Enlarge the popup on hover */
        }

        /* Logo Styles */
        .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            margin-top: 40px;
            margin-right: 40px;
            width: 100px; /* Adjust logo size as needed */
            height: auto;
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
<!--<script src="https://cdn.jsdelivr.net/npm/docx@4.8.0/build/docx.browser.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html-docx-js/0.8.0/html-docx.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.4/mammoth.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



<!-- content  -->
<section id="main" class="main">
    <h2>Reports</h2>

    <?php
    //        var_dump($rep3->emplocation);
    $categoryparsedString = '';

    foreach ($rep1->category as $key => $value) {
        $categoryparsedString .= $key . ': ' . $value . "\\n\\n";
    }

    ?>

    <div class="report-widgets">
        <div class="report-widget" onclick="openPopup('Population Statistics', 'No of Employers: <?= $rep1->employers?>\n\nNo of Workers(Unverified): <?= $rep1->workersunveri?>\n\nNo of Workers(Verified): <?= $rep1->workersveri?>\n\nNo of Crew Members: <?= $rep1->crew?>\n\nWorker Categories\n\n<?=$categoryparsedString?>\n\n\nDate: <?= date("m-d-y")?>')">
            <i class="bi bi-person large-icon"></i>
            <a href="#">Population Statistics</a>
            <div class="widget-content">
                <p>User Statistic Basics</p>
                <p><?= date("m-d-y")?></p>
            </div>
        </div>

        <!-- Include other report widgets as needed -->

        <div class="report-widget" onclick="openPopup('Job Statistics', 'Employer Requests\n\nAccepted: <?= $rep2->empacc?>\n\nExpired: <?= $rep2->emplexp?>\n\nCancelled: <?= $rep2->empcanc?>\n\nRejected: <?= $rep2->emprej?>\n\nRequested: <?= $rep2->empreqs?>\n\nWorker Requests\n\nAccepted: NA\n\nExpired: NA\n\nPending: <?= $rep2->workpend?>\n\nDate: <?= date("m-d-y")?>')">
            <i class="bi bi-file-earmark-text large-icon"></i>
            <a href="#">Requests</a>
            <div class="widget-content">
                <p>Request Statistics Basics</p>
                <p><?= date("m-d-y")?></p>
            </div>
        </div>




        <div class="report-widget" onclick="openPopup3()">
            <i class="bx bx-dollar large-icon"></i>
            <a href="#">Finances </a>
            <div class="widget-content">
                <p>Last 30 days</p>
                <p><?= date("m-d-y")?></p>
            </div>
        </div>

        <?php
//        var_dump($rep3->emplocation);
        $empparsedString = '';

        foreach ($rep3->emplocation as $key => $value) {
            $empparsedString .= $key . ': ' . $value . "\\n\\n";
        }
        $workparsedString = '';

        foreach ($rep3->worklocation as $key => $value) {
            $workparsedString .= $key . ': ' . $value . "\\n\\n";
        }

        ?>

        <div class="report-widget" onclick="openPopup('User Demographics', 'Employer\n\n<?=$empparsedString?>Worker\n\n<?=$workparsedString?>Date: <?= date("m-d-y")?>')">
            <i class="bi bi-file-earmark large-icon"></i>
            <a href="#">Demographics</a>
            <div class="widget-content">
                <p>User demographics by location</p>
                <p><?= date("m-d-y")?></p>
            </div>
        </div>

        <div class="report-widget" onclick="openPopup2()">
            <i class="bi bi-file-earmark large-icon"></i>
            <a href="#">Tickets</a>
            <div class="widget-content">
                <p>User Tickets last 30 days</p>
                <p><?= date("m-d-y")?></p>
            </div>
        </div>
    </div>
</section>

<!-- Popup -->
<div id="popup">
    <div class="popup-content">
        <img src="<?=ROOT?>/assets/images/logoe.png" alt="Logo" class="logo">
        <h2 id="popup-title"></h2>
        <p id="popup-data"></p>
        <button onclick="downloadReport()">Download Report</button>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<div id="popup2">
    <div class="popup-content2">
        <img src="<?=ROOT?>/assets/images/logoe.png" alt="Logo" class="logo">
        <h2 id="popup-title">Tickets for the past month</h2>
        <h3>Employer Tickets</h3>
        <table class="ticket-table">
            <thead>
            <tr>
                <th>Ticket ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Archived</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rep5->last30emp as $ticket): ?>
                <tr>
                    <td><?= $ticket->ticket_id ?></td>
                    <td><?= $ticket->user ?></td>
                    <td><?= $ticket->title ?></td>
                    <td><?= $ticket->archived ? 'Yes' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Worker Tickets</h3>
        <table class="ticket-table">
            <thead>
            <tr>
                <th>Ticket ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Archived</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rep5->last30work as $ticket): ?>
                <tr>
                    <td><?= $ticket->ticket_id ?></td>
                    <td><?= $ticket->user ?></td>
                    <td><?= $ticket->title ?></td>
                    <td><?= $ticket->archived ? 'Yes' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h3>Archived Employer Tickets: <?=$rep5->emparchived?></h3>
        <h3>Non-Archived Employer Tickets: <?=$rep5->empnonarchived?></h3>
        <h3>Archived Worker Tickets: <?=$rep5->workarchived?></h3>
        <h3>Non-Archived Worker Tickets: <?=$rep5->worknonarchived?></h3>

        <button onclick="downloadReport2()">Download Report</button>
        <button onclick="closePopup2()">Close</button>
    </div>
</div>

<div id="popup3">
    <div class="popup-content3">
        <img src="<?=ROOT?>/assets/images/logoe.png" alt="Logo" class="logo">
        <h2 id="popup-title">Finances for the past month</h2>
        <h3>Employer Requests Payments</h3>
        <table class="ticket-table">
            <thead>
            <tr>
                <th>Employer Request ID</th>
                <th>Title</th>
                <th>Employer ID</th>
                <th>Worker ID</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rep4->last30empreqpays as $pay): ?>
                <tr>
                    <td><?= $pay->req_id ?></td>
                    <td><?= $pay->title ?></td>
                    <td><?= $pay->emp_id ?></td>
                    <td><?= $pay->work_id?></td>
                    <td><?= $pay->amount?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Worker Requests Payments</h3>
        <table class="ticket-table">
            <thead>
            <tr>
                <th>Employer Request ID</th>
                <th>Title</th>
                <th>Employer ID</th>
                <th>Worker ID</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rep4->last30empreqpays as $pay): ?>
                <tr>
                    <td><?= $pay->req_id ?></td>
                    <td><?= $pay->title ?></td>
                    <td><?= $pay->emp_id ?></td>
                    <td><?= $pay->work_id?></td>
                    <td><?= $pay->amount?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h3>Employer Request Payments: <?=$rep4->empreqcount?></h3>
<!--        <h3>Non-Archived Employer Tickets: --><?php //=$rep5->empnonarchived?><!--</h3>-->
<!--        <h3>Archived Worker Tickets: --><?php //=$rep5->workarchived?><!--</h3>-->
<!--        <h3>Non-Archived Worker Tickets: --><?php //=$rep5->worknonarchived?><!--</h3>-->

        <button onclick="downloadReport3()">Download Report</button>
        <button onclick="closePopup3()">Close</button>
    </div>
</div>


<script>
    function openPopup(title, data) {
        // Replace line breaks with <br> tags and escape single quotes
        data = data.replace(/\n/g, '<br>').replace(/'/g, "\\'");

        document.getElementById('popup-title').innerHTML = title;
        document.getElementById('popup-data').innerHTML = data;
        document.getElementById('popup').style.display = 'flex';
    }

    function openPopup2() {
        // Replace line breaks with <br> tags and escape single quotes

        // document.getElementById('popup-data').innerHTML = data;
        document.getElementById('popup2').style.display = 'flex';
    }

    function openPopup3() {
        // Replace line breaks with <br> tags and escape single quotes

        // document.getElementById('popup-data').innerHTML = data;
        document.getElementById('popup3').style.display = 'flex';
    }


    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    function closePopup2() {
        document.getElementById('popup2').style.display = 'none';
    }
    function closePopup3() {
        document.getElementById('popup3').style.display = 'none';
    }

    function downloadReport() {
        var popupContent = document.getElementById('popup').innerHTML;

        try {
            // Open the popup content in a new window
            var newWindow = window.open('', '_blank');
            newWindow.document.write(popupContent);

            // Close the popup
            closePopup();
        } catch (error) {
            console.error('Error generating or downloading the report:', error);
            alert('An error occurred while downloading the report. Please try again later.');
        }
    }

    function downloadReport2() {
        var popupContent = document.getElementById('popup2').innerHTML;

        try {
            // Open the popup content in a new window
            var newWindow = window.open('', '_blank');
            newWindow.document.write(popupContent);

            // Close the popup
            closePopup2();
        } catch (error) {
            console.error('Error generating or downloading the report:', error);
            alert('An error occurred while downloading the report. Please try again later.');
        }
    }

    function downloadReport3() {
        var popupContent = document.getElementById('popup3').innerHTML;

        try {
            // Open the popup content in a new window
            var newWindow = window.open('', '_blank');
            newWindow.document.write(popupContent);

            // Close the popup
            closePopup2();
        } catch (error) {
            console.error('Error generating or downloading the report:', error);
            alert('An error occurred while downloading the report. Please try again later.');
        }
    }
</script>

</body>

</html>
