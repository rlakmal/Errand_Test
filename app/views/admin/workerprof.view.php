<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .archive-button {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            border: none;
        }

        .archive-button.archive {
            background-color: #e74c3c;
            color: #fff;
        }

        .archive-button.unarchive {
            background-color: #2ecc71;
            color: #fff;
        }

        .verification-badge {
            font-size: 18px;
            color: #2ecc71; /* Green color for verified */
        }

        .not-verified-badge {
            font-size: 18px;
            color: #e74c3c; /* Red color for not verified */
        }

        .stripe-status {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        /* Popup Styling */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 40px; /* Increase padding for a bigger popup */
            border-radius: 20px; /* Add curved edges */
            z-index: 1000;
            display: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
            animation: popup-animation 0.5s ease forwards; /* Add animation */
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        /* Animation keyframes */
        @keyframes popup-animation {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .popup img {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px; /* Adjust size of the image */
            height: 50px; /* Adjust size of the image */
            border-radius: 50%; /* Make the image round */
            border: 2px solid #fff; /* Add border for contrast */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        }

    </style>
</head>

<body>
<?php include 'sidebar.php' ?>

<?php include 'navigationbar.php' ?>

<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<div class="main-container3">
    <div class="profile-container2">
        <a href="<?= ROOT ?>/admin/workers2"><button class="close-button">Close</button></a>
        <!-- Delete Button -->
        <button style="border-radius: 20px; background-color: red" class="close-button" id="delete-button">Delete</button>

        <?php if ($data['newData']['verified']) : ?>
            <span class="verification-badge"><i class="fas fa-check-circle"></i> Verified</span>
        <?php else : ?>
            <span class="not-verified-badge"><i class="fas fa-times-circle"></i> Not Verified</span>
        <?php endif; ?>

        <div class="picture">
            <img class="image" src="<?= ROOT ?>/assets/images/<?php if($data['newData']['profile_image']) echo "profileImages/".$data['newData']['profile_image']; else echo  "employer/profile.jpg" ?>" alt="">
        </div>
        <div class="picture">
            <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
        </div>
        <div class="gsc">
            <h3>
                View GS cerificate
            </h3>
            <input type="text" name="fullname" value="Click Here" readonly>
        </div>
        <div class="index">

            <h3>
                Full Name
            </h3>

            <input type="text" name="fullname" value=<?php echo ucfirst($data['newData']['name']); ?> class="edit-gen" readonly>
            <h3>
                City
            </h3>
            <input type="text" name="city" value=<?php echo ucfirst($data['newData']['city']); ?> class="edit-gen" readonly>
            <h3>
                Address
            </h3>
            <input type="text" name="address" value=<?php echo ucfirst($data['newData']['address']); ?>class="edit-gen" readonly>
            <h3>
                Date of Birth
            </h3>
            <input type="text" name="birthday" value=<?php echo ucfirst($data['newData']['dob']); ?> class="edit-gen" readonly>
            <h3>
                Profession
            </h3>
            <input type="text" name="profession" value=<?php echo ucfirst($data['newData']['category']); ?> class="edit-gen" readonly>

            <h3>
                Skills
            </h3>
            <input type="text" name="skills" value="" class="edit-gen-skill" readonly>
            <h3>
                Expierience
            </h3>
            <input type="text" name="expierience" value="" class="edit-gen-skill" readonly>

        </div>

    </div>
</div>

<!-- Popup HTML -->
<div class="popup" id="popup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Image" /> <!-- Add your image here -->
    <h2>Are you sure you want to delete?</h2>
    <form method="post" action="<?= ROOT ?>/admin/workerprof?id=<?= $data['newData']['id'] ?>">
        <input style="margin-top: 5px; border-radius: 20px" type="submit" class="archive-button archive" value="Yes, Delete" name="Delete">
    </form>
    <button style="background-color: #1eea07; border-radius: 20px" class="archive-button archive" id="cancel-delete">No, Cancel</button>
</div>


</body>
<script src="<?= ROOT ?>/assets/js/employer/requestjob.js"></script>

<script>
    // Function to display popup when delete button is clicked
    document.getElementById('delete-button').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popup-overlay').style.display = 'block';
    });

    // Function to close popup when cancel button is clicked
    document.getElementById('cancel-delete').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popup-overlay').style.display = 'none';
    });
</script>

</html>
