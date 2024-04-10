<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobpost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/home.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* Custom CSS for post-container */
        .post-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f4f4f4;
            max-width: 1000px; /* Adjust as needed */
            margin: 0 auto; /* Center horizontally */
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .post-frame {
            padding: 20px; /* Add padding */
            margin-bottom: 20px; /* Add margin */
            border-radius: 10px; /* Keep border-radius consistent */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Keep box shadow consistent */
            background-color: #f9f9f9; /* Lighter background color */
        }

        .picture {
            margin-right: 20px;
        }

        .index {
            flex: 1;
        }

        .index > div {
            margin-bottom: 10px;
        }

        .image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 24px; /* Increased font size */
            font-weight: bold;
            color: #333; /* Darkened text color */
        }

        .profile-ratings {
            color: #777;
            font-size: 14px; /* Decreased font size */
        }

        .profile-type {
            font-style: italic;
            color: #555; /* Slightly darkened text color */
            font-size: 18px; /* Increased font size */
        }

        .profile-id {
            display: none; /* Hide profile ID initially */
        }

        .budget {
            font-weight: bold;
            color: #009688; /* Custom color for budget */
            font-size: 20px; /* Increased font size */
        }

        .location {
            color: #666;
            font-size: 16px; /* Increased font size */
        }

        .icon {
            margin-left: 5px;
            font-size: 18px;
            color: #777;
        }

        .view-profile-button {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            background-color: #3498db;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .view-profile-button:hover {
            background-color: #2980b9;
        }

        /* Styles for search form */
        .search-form {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 10px;
            background-color: #f4f4f4;
        }

        .search-input {
            width: 13%;
            padding: 8px;
            border-radius: 20px;
            border: none;
            outline: none;
            align-self: center;
        }

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
    </style>
    <title>Document</title>
</head>

<body>
<?php include 'navigationbar.php' ?>
<?php include 'sidebar.php' ?>

<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<div style="text-align: center">
    <h2 style="margin-top: 15px ">Posted Jobs</h2>
</div>

<!-- Search Form -->
<div style="text-align: center" class="search-form" >
    <input class="search-input" type="text" name="query" id="searchQuery" placeholder="Search by title or ID">
    <i class='bx bx-search icon'></i>
</div>

<div class="set-margin" id="set-marginid">
    <?php
    if (is_array($data)) {
        foreach ($data as $item) {
            date_default_timezone_set('Asia/Kolkata');
            $date1 = new DateTime($item->job_created);
            $date2 = new DateTime();
            $interval = $date1->diff($date2);

            $days_difference = $interval->days;
            $hours_difference = $interval->h;
            $minutes_difference = $interval->i;
            $seconds_difference = $interval->s;


            if ($days_difference > 0) {
                $times_ago = $days_difference . " days ago";
            } elseif ($hours_difference > 0) {
                $times_ago = $hours_difference . " hours ago";
            } elseif ($minutes_difference > 0) {
                $times_ago = $minutes_difference . " minutes ago";
            } elseif ($seconds_difference > 0) {
                $times_ago = $seconds_difference . " seconds ago";
            } elseif ($seconds_difference == 0) {
                $times_ago = " Just Now";
            }

            ?>
            <div class="post-frame">
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-ratings"><?php echo $times_ago ?></div>
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="profile-id"><?php echo $item->id ?></div> <!-- Hidden profile ID -->
                            <div class="budget">Rs <?php echo $item->budget ?>/= per day</div>
                            <div class="location">
                                <?php echo $item->city ?>
                                <i class="bx bxs-map icon"></i>
                            </div>
                        </div>
                        <button class="view-profile-button delete-button" data-id="<?php echo $item->id ?>">Delete</button>
                        <a style="margin-left: 10px" href="<?= ROOT ?>/admin/viewjob?id=<?= $item->id ?>"><button style="margin-right: 10px" class="view-profile-button">View Job</button></a>
                        <!-- <a></a><button class="edit-profile-button">Edit</button></a> -->
                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
</div>

<div class="popup" id="popup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Image" /> <!-- Add your image here -->
    <h2>Are you sure you want to delete?</h2>
    <form id="deleteForm" method="post" action="<?= ROOT ?>/admin/jobs?id=">
        <input type="hidden" id="deleteId" name="deleteId" value="">
        <input style="margin-top: 5px; border-radius: 20px" type="submit" class="archive-button archive" value="Yes, Delete" name="Delete">
    </form>
    <button style="background-color: #1eea07; border-radius: 20px" class="archive-button archive" id="cancel-delete">No, Cancel</button>
</div>


<script>
    // Get reference to the search input field
    const searchInput = document.getElementById('searchQuery');

    // Add event listener for input change
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.trim().toLowerCase(); // Get the trimmed and lowercased search value

        // Get all post frames
        const postFrames = document.querySelectorAll('.post-frame');

        // Loop through each post frame
        postFrames.forEach(frame => {
            // Get the job title and ID
            const title = frame.querySelector('.profile-type').textContent.toLowerCase();
            const id = frame.querySelector('.profile-id').textContent.toLowerCase();

            // Check if search value matches title or ID
            if (title.includes(searchValue) || id.includes(searchValue)) {
                // Show the post frame if it matches
                frame.style.display = 'block';
            } else {
                // Hide the post frame if it doesn't match
                frame.style.display = 'none';
            }
        });
    });

        // Add event listener to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-id');
            const form = document.getElementById('deleteForm');
            // Update the action attribute of the form
            form.action = "<?= ROOT ?>/admin/jobs?id=" + postId;
            document.getElementById('deleteId').value = postId;
            document.getElementById('popup').style.display = 'block';
            document.querySelector('.popup-overlay').style.display = 'block';

            console.log(postId)
        });
    });

        // Add event listener to cancel delete button
        document.getElementById('cancel-delete').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
        document.querySelector('.popup-overlay').style.display = 'none';
    });

</script>

</body>

</html>
