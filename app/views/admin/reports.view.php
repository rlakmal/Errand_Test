<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/reports.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css"> <!-- Bootstrap Icons CDN -->
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
<!--<script src="https://cdn.jsdelivr.net/npm/docx@4.8.0/build/docx.browser.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html-docx-js/0.8.0/html-docx.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.4/mammoth.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



<!-- content  -->
<section  id="main" class="main" style=" max-height: 90vh; overflow-y: hidden; width: 95%; justify-content: left">
    <h2 >Reports</h2>

   <div style="overflow-y: scroll; height: 800px">
       <h2 class = "titles" style="text-align: center">User</h2>

       <div class="report-widgets">

           <?php
           //        var_dump($rep3->emplocation);
           $categoryparsedString = '';

           foreach ($rep1->category as $key => $value) {
               $categoryparsedString .= $key . ': ' . $value . "\\n\\n";
           }

           ?>


           <div style="background-color: darkblue; " class="report-widget" onclick="openPopup('Population Statistics', 'No of Employers: <?= $rep1->employers?>\n\nNo of Workers(Unverified): <?= $rep1->workersunveri?>\n\nNo of Workers(Verified): <?= $rep1->workersveri?>\n\nNo of Crew Members: <?= $rep1->crew?>\n\nWorker Categories\n\n<?=$categoryparsedString?>\n\n\nDate: <?= date("m-d-y")?>')">
               <i class="bx bx-male large-icon"></i>
               <a href="#">Population Statistics</a>
               <div class="widget-content">
                   <p>User Statistic Basics</p>
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

           <div  style="background: darkred" class="report-widget" onclick="openPopup('User Demographics', 'Employer\n\n<?=$empparsedString?>Worker\n\n<?=$workparsedString?>Date: <?= date("m-d-y")?>')">
               <i class="bx bxs-location-plus large-icon"></i>
               <a href="#">Demographics</a>
               <div class="widget-content">
                   <p>User demographics by location</p>
                   <p><?= date("m-d-y")?></p>
               </div>
           </div>



       </div>

       <h2 class = "titles" style="text-align: center">Business</h2>



       <div class="report-widgets">


           <!-- Include other report widgets as needed -->

           <div style="background: #f16a2d" class="report-widget" onclick="openPopup('Job Statistics', 'Employer Requests\n\nAccepted: <?= $rep2->empacc?>\n\nExpired: <?= $rep2->emplexp?>\n\nCancelled: <?= $rep2->empcanc?>\n\nRejected: <?= $rep2->emprej?>\n\nRequested: <?= $rep2->empreqs?>\n\nWorker Requests\n\nAccepted: NA\n\nExpired: NA\n\nPending: <?= $rep2->workpend?>\n\nDate: <?= date("m-d-y")?>')">
               <i class="bx bxs-flag-alt large-icon"></i>
               <a href="#">Requests</a>
               <div class="widget-content">
                   <p>Request Statistics Basics</p>
                   <p><?= date("m-d-y")?></p>
               </div>
           </div>

           <div style="background-color: green" class="report-widget" onclick="openPopup3()">
               <i class="bx bx-dollar large-icon"></i>
               <a href="#">Finances </a>
               <div class="widget-content">
                   <p>Last 30 days</p>
                   <p><?= date("m-d-y")?></p>
               </div>
           </div>


       </div>

       <h2 class = "titles" style="text-align: center">Support</h2>


       <div class="report-widgets">



           <div style="background: darkgrey" class="report-widget" onclick="openPopup2()">
               <i class="bx bxs-hand large-icon"></i>
               <a href="#">Tickets</a>
               <div class="widget-content">
                   <p>User Tickets last 30 days</p>
                   <p><?= date("m-d-y")?></p>
               </div>
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

        <button style="background: #f16a2d" onclick="downloadReport2()">Download Report</button>
        <button style="background: #f16a2d" onclick="closePopup2()">Close</button>
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
            <?php foreach ($rep4->last30workreqpays as $pay): ?>
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
        <h3>Worker Request Payments: <?=$rep4->workreqcount?></h3>
        <h3>Employer Request Payments Sum: <?=$rep4->last30empsum?></h3>
        <h3>Worker Request Payments Sum: <?=$rep4->last30worksum?></h3>
<!--        <h3>Non-Archived Employer Tickets: --><?php //=$rep5->empnonarchived?><!--</h3>-->
<!--        <h3>Archived Worker Tickets: --><?php //=$rep5->workarchived?><!--</h3>-->
<!--        <h3>Non-Archived Worker Tickets: --><?php //=$rep5->worknonarchived?><!--</h3>-->

        <button style="background: #f16a2d" onclick="downloadReport3()">Download Report</button>
        <button  style="background: #f16a2d" onclick="closePopup3()">Close</button>
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
