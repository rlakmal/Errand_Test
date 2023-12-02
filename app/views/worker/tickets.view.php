<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emphome.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Add your additional styles here */
        .archived-button {
            background-color: green;
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
            cursor: pointer;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        /* Adjusted post-container CSS */
        .post-container {
            display: flex;
            justify-content: space-between;
            align-content: center;
            align-items: center;
            margin-bottom: 20px;
            /*border: 1px solid #ddd; !* Add a border for better visibility *!*/
            padding: 10px; /* Add padding for spacing */
        }

        .profile-container2 {
            display: flex;
            align-items: center;
        }

        .index {
            /*flex: 1;*/
            justify-content: center;
            align-content: center;
            align-items: center;
            margin-left: 10px; /* Add margin for spacing */
        }

        .view-profile-button {
            margin-left: 10px; /* Add margin for spacing */
        }

        /* Styles for the "Raise New Ticket" button */
        #raise-ticket-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        #raise-ticket-button:hover {
            background-color: #2980b9;
        }

        /* Styles for the popup form */
        .popup form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .popup label {
            margin-bottom: 5px;
        }

        .popup input,
        .popup textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .popup button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup button:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Document</title>
</head>

<body>

<?php include 'workernav.php' ?>
<?php //include 'workerfilter.php' ?>
<section id="main" class="main">

    <div class="set-margin" id="set-marginid">
        <button id="raise-ticket-button">Raise New Ticket</button>

        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
                ?>
                <div class="post-container">
                    <div class="profile-container2">
                        <!-- <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                            </div> -->
                        <div class="index">
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="profile-name"><?php echo $item->description ?></div>
                            <div class="profile-ratings">Raised @ <?php echo $item->created ?></div>

                            <div class="profile-buttons">
                                <?php if ($item->archived) { ?>
                                    <button class="archived-button" disabled>Archived</button>
                                <?php } else { ?>
                                    <button class="unarchived-button" disabled>Not Archived</button>
                                <?php } ?>
                            </div>
                        </div>
                        <!--                        <a><button class="view-profile-button" id="request-button">View</button></a>-->
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>

</section>

<!-- "Raise New Ticket" Button -->

<!-- Popup Form -->
<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <h2>Raise New Ticket</h2>
    <!-- Add your form fields here -->
    <form action="<?= ROOT ?>/worker/tickets" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    <button id="close-popup">Close</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add event listeners for the archived/unarchived buttons
        var unarchivedButtons = document.querySelectorAll('.unarchived-button');
        unarchivedButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Implement the logic to handle the "Not Archived" button click
                console.log('Not Archived button clicked');
            });
        });

        // Add event listener for the "Raise New Ticket" button
        var raiseTicketButton = document.getElementById('raise-ticket-button');
        raiseTicketButton.addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        });

        // Add event listener for the close button in the popup
        var closePopupButton = document.getElementById('close-popup');
        closePopupButton.addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        });
    });
</script>
</body>

</html>
