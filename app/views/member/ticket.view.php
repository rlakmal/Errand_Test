<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            line-height: 1.6;
        }

        /* Flexbox Layout */
        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .main {
            flex: 1;
            padding: 20px;
            overflow-x: auto;
        }

        /* Ticket Details Styling */
        .ticket-details {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .ticket-details:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .ticket-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: #333;
        }

        .ticket-details p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }

        /* Archive Button Styling */
        .archive-button {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .archive-button.archive {
            background-color: #e74c3c;
            color: #fff;
        }

        .archive-button.unarchive {
            background-color: #2ecc71;
            color: #fff;
        }

        .archive-button:hover {
            background-color: #555;
        }

        /* Notes Styling */
        .note-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .note-item {
            background-color: #ecf0f1;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .note-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .note-item p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .note-item small {
            display: block;
            font-size: 12px;
            color: #777;
        }

        /* Add Note Form Styling */
        .add-note-form {
            margin-top: 20px;
        }

        .add-note-form h2 {
            font-size: 24px;
            margin-bottom: 15px;
            text-transform: uppercase;
            color: #333;
        }

        .add-note-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            resize: none;
            font-size: 16px;
            border: 1px solid #ddd;
        }

        .add-note-form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .add-note-form button:hover {
            background-color: #218c74;
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

<!-- Content -->
<section id="main" class="main">
    <div class="ticket-details">
        <h2>Ticket <?= $ticket->id ?> : <?= $ticket->title ?></h2>
        <h3></h3>
        <h4 style="font-size: 20px"><?= $ticket->description ?></h4>
        <p>User Type: Placeholder</p>
        <p><?= $ticket->created ?></p>

        <form method="post" action="<?= ROOT ?>/member/ticket?id=<?= $ticket->id ?>">
            <input type="submit" class="archive-button <?= $ticket->archived ? 'unarchive' : 'archive' ?>"
                   value="<?= $ticket->archived ? 'Unarchive' : 'Archive' ?>"
                   name="<?= $ticket->archived ? 'unarchive' : 'archive' ?>">
        </form>
    </div>

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

<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>
