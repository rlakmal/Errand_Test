<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticket Details</title>
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

        .ticket-details {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .ticket-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ticket-details p {
            font-size: 16px;
            margin: 5px 0;
        }

        .archive-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .note-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .note-item {
            background-color: #ecf0f1;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .note-item p {
            margin: 0;
            font-size: 14px;
        }

        .add-note-form {
            margin-top: 20px;
        }

        .add-note-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            resize: none;
        }

        .add-note-form button {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
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
    <div class="ticket-details">
        <h2>Ticket Details</h2>
        <p>Title: Ticket Title</p>
        <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p>User Type: Admin</p>
        <p>Archived: No</p>
        <p>Raised Datetime: October 25, 2023</p>
    </div>

    <button class="archive-button">Archive Ticket</button>

    <h2>Notes</h2>
    <ul class="note-list">
        <li class="note-item">
            <p>Note 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </li>
        <li class="note-item">
            <p>Note 2: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </li>
        <!-- Add more notes as needed -->
    </ul>

    <div class="add-note-form">
        <h2>Add Note</h2>
        <textarea placeholder="Type your note here"></textarea>
        <button>Add Note</button>
    </div>
</section>
</body>

</html>
