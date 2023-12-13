<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticket Details</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
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
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            border: none;
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

        .note-item small {
            display: block;
            font-size: 12px;
            color: #777;
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

        .archive-button.archive {
            background-color: #e74c3c;
            color: #fff;
        }

        .archive-button.unarchive {
            background-color: #2ecc71;
            color: #fff;
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
        <h2>Ticket <?= $ticket->id ?></h2>
        <p><?= $ticket->title ?></p>
        <p><?= $ticket->description ?></p>
        <p>User Type: Placeholder</p>
        <p><?= $ticket->created ?></p>
    </div>

    <form method="post" action="<?= ROOT ?>/member/ticket?id=<?= $ticket->id ?>">
        <input type="submit" class="archive-button <?= $ticket->archived ? 'unarchive' : 'archive' ?>"
               value="<?= $ticket->archived ? 'Unarchive' : 'Archive' ?>"
               name="<?= $ticket->archived ? 'unarchive' : 'archive' ?>">
    </form>

    <h2>Notes</h2>
    <?php if (!empty($notes)) : ?>
        <ul class="note-list">
            <?php foreach ($notes as $item) : ?>
                <li class="note-item">
                    <p><?= $item->note_body ?></p>
                    <small><?= $item->created ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No notes available.</p>
    <?php endif; ?>

    <div class="add-note-form">
        <h2>Add Note</h2>
        <form method="post" action="<?= ROOT ?>/member/ticket?id=<?= $ticket->id ?>">
            <!-- Replace 'process_note.php' with the actual form processing script -->
            <textarea name="body" placeholder="Type your note here"></textarea>
            <button type="submit">Add Note</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
